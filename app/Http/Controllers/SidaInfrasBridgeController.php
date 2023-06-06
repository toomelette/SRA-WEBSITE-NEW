<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfrastructureProg\InfrastructureProgFormRequest;
use App\Http\Requests\InfrastructureProg\InfrastructureProgFilterRequest;
use App\Models\SidaInfrasBridge;
use App\Models\Year;
use App\Models\YearBlockFarm;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class SidaInfrasBridgeController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $infrastructure_prog = SidaInfrasBridge::query()->orderByDesc('year');
            return DataTables::of($infrastructure_prog)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.sidaInfrasBridge.destroy","slug")."'";
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
        return view('dashboard.sidaInfrasBridge.index');
    }



    public function create(){

        return view('dashboard.sidaInfrasBridge.create');

    }



    public function store(InfrastructureProgFormRequest $request)
    {
        $infrastructureProg = new SidaInfrasBridge();
        $infrastructureProg->slug = Str::random(15);
        $year = YearBlockFarm::query()->where('slug','=',$request->year)->first();
        $infrastructureProg->year_slug = $year->slug;
        $infrastructureProg->year = $year->name;
        $infrastructureProg->date = $request->date;
        $infrastructureProg->file_title = $request->file_title;
        $infrastructureProg->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'sida_infrastructure_prog/'. $infrastructureProg->crop_year.'/'.$client_original_filename;
            $infrastructureProg->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $infrastructureProg->save();
        return redirect('dashboard/sidaInfrasBridge/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(InfrastructureProgFormRequest $request, $slug){
        $news = News::query()->where('slug',$slug)->first();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->img_url = $request->img_url;
        $news->date = $request->date;
        $news->date_start = $request->date_start;
        $news->date_end = $request->date_end;
        $news->update();
        return redirect('dashboard/sidaInfrasBridge/edit');

    }


    public function destroy($slug){
        $infrastructureProg = SidaInfrasBridge::query()->where('slug','=',$slug)->first();
        if(!empty($infrastructureProg)){
            $infrastructureProg->delete();
            return 1;
        }
        abort(503,'Error deleting Infrastructure Program. [SidaInfrasBridgeController::destroy]');
        return 1;

        $infrastructureProg = SidaInfrasBridge::query()->find($slug);
        if ($infrastructureProg->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Infrastructure Program!');

        return $infrastructureProg;
    }

    public function showLatest(){
        $latestData = SidaInfrasBridge::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
