<?php

namespace App\Http\Controllers;

use App\Http\Requests\MillsitePrices\MillSitePricesFormRequest;
use App\Http\Requests\MillsitePrices\MillSitePricesFilterRequest;
use App\Models\MillSitePrices;
use App\Models\CropYear;
use App\Swep\ViewHelpers\__html;
use http\Message;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;



class MillSitePricesController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $millsite_prices = MillsitePrices::query()->orderByDesc('crop_year');
            return DataTables::of($millsite_prices)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.millsitePrices.destroy","slug")."'";
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
        return view('dashboard.millsitePrices.index');
    }



    public function create(){

        return view('dashboard.millsitePrices.create');

    }



    public function store(MillSitePricesFormRequest $request)
    {
        $millSitePrices = new MillsitePrices();
        $millSitePrices->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $millSitePrices->crop_year_slug = $cropYear->slug;
        $millSitePrices->crop_year = $cropYear->name;
        $millSitePrices->file_title = $request->file_title;
        $millSitePrices->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'millsite_prices/'. $millSitePrices->crop_year;
                $millSitePrices->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }
        $millSitePrices->save();
        return redirect('dashboard/millsitePrices/create');
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
        abort(503,'Error deleting Millsite Prices. [MillsitePricesController::destroy]');
        return 1;

        $millsitePrices = MillSitePrices::query()->find($slug);
        if ($millsitePrices->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Millsite Prices!');

        return $millsitePrices;
    }




}
