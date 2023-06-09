<?php

namespace App\Http\Controllers;

use App\Http\Requests\MillSitePrices\MillSitePricesFormRequest;
use App\Http\Requests\MillSitePrices\MillSitePricesFilterRequest;
use App\Http\Requests\SugarSupplyDemand\SugarSupplyDemandFormRequest;
use App\Models\MillsitePrices;
use App\Models\CropYear;
use App\Models\SugarSupplyDemand;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;



class MillSite_PricesController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $millsite_prices = MillsitePrices::query()->orderByDesc('date');
            return DataTables::of($millsite_prices)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.millSite_Prices.destroy","slug")."'";
                    $slug = "'".$data->slug."'";
                    return '<div class="btn-group">

                                <button type="button" onclick="delete_data('.$slug.','.$destroy_route.')" data="'.$data->slug.'" class="btn btn-sm btn-danger" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>';
                    return '<div class="btn-group">
                                
                               
                            </div>';
                })
                ->setRowId('slug')
                ->escapeColumns([])
                ->toJson();
        }
        return view('dashboard.millSite_Prices.index');
    }



    public function create(){

        return view('dashboard.millSite_Prices.create');

    }



    public function store(MillSitePricesFormRequest $request)
    {
        $millsitePrices = new MillsitePrices();
        $millsitePrices->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $millsitePrices->crop_year_slug = $cropYear->slug;
        $millsitePrices->crop_year = $cropYear->name;
        $millsitePrices->date = $request->date;
        $millsitePrices->file_title = $request->file_title;
        $millsitePrices->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'millsite_prices/'. $millsitePrices->crop_year.'/'.$client_original_filename;
            $millsitePrices->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $millsitePrices->save();
        return redirect('dashboard/millSite_Prices/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(MillSitePricesFormRequest $request, $slug){
        $news = News::query()->where('slug',$slug)->first();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->img_url = $request->img_url;
        $news->date = $request->date;
        $news->date_start = $request->date_start;
        $news->date_end = $request->date_end;
        $news->update();
        return redirect('dashboard/news/edit');

    }

    public function destroy($slug){
        $millsitePrices = MillsitePrices::query()->where('slug','=',$slug)->first();
        if(!empty($millsitePrices)){
            $millsitePrices->delete();
            return 1;
        }
        abort(503,'Error deleting Millsite Price. [MillSite_PricesController::destroy]');
        return 1;

        $millsitePrices = MillsitePrices::query()->find($slug);
        if ($millsitePrices->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Millsite Prices!');

        return $millsitePrices;
    }

    public function showLatest(){
        $latestData = MillsitePrices::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
