<?php

namespace App\Http\Controllers;

use App\Http\Requests\MetroManilaPrices\MetroManilaPricesFilterRequest;
use App\Http\Requests\MetroManilaPrices\MetroManilaPricesFormRequest;
use App\Models\MetroManilaPrices;
use App\Models\CropYear;
use App\Models\SugarOrder;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class MetroManilaPricesController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $metro_manila_prices = MetroManilaPrices::query()->orderByDesc('crop_year');
            return DataTables::of($metro_manila_prices)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.metroManilaPrices.destroy","slug")."'";
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
        return view('dashboard.metroManilaPrices.index');
    }



    public function create(){

        return view('dashboard.metroManilaPrices.create');

    }



    public function store(MetroManilaPricesFormRequest $request)
    {
        $metroManilaPrices = new MetroManilaPrices();
        $metroManilaPrices->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $metroManilaPrices->crop_year_slug = $cropYear->slug;
        $metroManilaPrices->crop_year = $cropYear->name;
        $metroManilaPrices->file_title = $request->file_title;
        $metroManilaPrices->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'metro_manila_prices/'. $metroManilaPrices->crop_year.'/'.$client_original_filename;
            $metroManilaPrices->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $metroManilaPrices->save();
        return redirect('dashboard/metroManilaPrices/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(MetroManilaPrices $request, $slug){
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
        $metroManilaPrices = MetroManilaPrices::query()->where('slug','=',$slug)->first();
        if(!empty($metroManilaPrices)){
            $metroManilaPrices->delete();
            return 1;
        }
        abort(503,'Error deleting Metro Manila Prices. [SugarOrderController::destroy]');
        return 1;

        $metroManilaPrices = MetroManilaPrices::query()->find($slug);
        if ($metroManilaPrices->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Metro Manila Prices!');

        return $metroManilaPrices;
    }




}
