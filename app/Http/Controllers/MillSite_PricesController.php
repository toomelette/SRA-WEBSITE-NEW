<?php

namespace App\Http\Controllers;

use App\Http\Requests\MillsitePrices\MillSitePricesFormRequest;
use App\Http\Requests\MillsitePrices\MillSitePricesFilterRequest;
use App\Http\Requests\SugarSupplyDemand\SugarSupplyDemandFormRequest;
use App\Models\MillSitePrices;
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
            $millsite_prices = MillSitePrices::query()->orderByDesc('crop_year');
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
        $millsitePrices = new MillSitePrices();
        $millsitePrices->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $millsitePrices->crop_year_slug = $cropYear->slug;
        $millsitePrices->crop_year = $cropYear->name;
        $millsitePrices->date = $request->date;
        $millsitePrices->file_title = $request->file_title;
        $millsitePrices->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'millsite_prices/'. $millsitePrices->crop_year;
                $millsitePrices->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
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
        $millsitePrices = MillSitePrices::query()->where('slug','=',$slug)->first();
        if(!empty($millsitePrices)){
            $millsitePrices->delete();
            return 1;
        }
        abort(503,'Error deleting Millsite Price. [MillSite_PricesController::destroy]');
        return 1;

        $millsitePrices = MillSitePrices::query()->find($slug);
        if ($millsitePrices->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Millsite Prices!');

        return $millsitePrices;
    }

    public function showLatest(){
        $latestData = MillSitePrices::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
