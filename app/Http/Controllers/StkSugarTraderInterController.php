<?php

namespace App\Http\Controllers;

use App\Http\Requests\StkSugarTradersInter\StkSugarTradersInterFilterRequest;
use App\Http\Requests\StkSugarTradersInter\StkSugarTradersInterFormRequest;
use App\Models\CropYearStakeholders;
use App\Models\StkSugarTradersInter;
use App\Models\User;
use App\Models\Year;
use App\Models\YearBlockFarm;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class StkSugarTraderInterController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $template = StkSugarTradersInter::query()->orderByDesc('year');
            return DataTables::of($template)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.stkSugarTradersInter.destroy","slug")."'";
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
        return view('dashboard.stkSugarTradersInter.index');
    }



    public function create(){

        return view('dashboard.stkSugarTradersInter.create');

    }



    public function store(StkSugarTradersInterFormRequest $request)
    {
        $template = new StkSugarTradersInter();
        $template->slug = Str::random(15);
        $year = CropYearStakeholders::query()->where('slug','=',$request->year)->first();
        $template->year_slug = $year->slug;
        $template->year = $year->name;
        $template->date = $request->date;
        $template->file_title = $request->file_title;
        $template->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'stk_sugar_traders_inter/'. $template->crop_year.'/'.$client_original_filename;
            $template->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $template->save();
        return redirect('dashboard/stkSugarTradersInter/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(StkSugarTradersInterFormRequest $request, $slug){
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
        $template = StkSugarTradersInter::query()->where('slug','=',$slug)->first();
        if(!empty($template)){
            $template->delete();
            return 1;
        }
        abort(503,'Error deleting Stakeholder. [StkSugarTraderInterController::destroy]');
        return 1;

        $template = StkSugarTradersInter::query()->find($slug);
        if ($template->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Station!');

        return $template;
    }

    public function post($slug){

        $template = StkSugarTradersInter::query()->where('slug','=',$slug)->first();
        if(!empty($template)){
            $template->update();
            return 1;
        }else{
            abort(500,'Error Posting!');
        }

    }






}
