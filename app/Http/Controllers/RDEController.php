<?php

namespace App\Http\Controllers;

use App\Http\Requests\RDEProg\RDEProgFormRequest;
use App\Http\Requests\RDEProg\RDEProgFilterRequest;
use App\Models\OptionRDE;
use App\Models\RDEProg;
use App\Models\Year;
use App\Models\YearBlockFarm;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class RDEController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $rde_prog = RDEProg::query()->orderByDesc('year');
            return DataTables::of($rde_prog)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.rdeProg.destroy","slug")."'";
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
        return view('dashboard.rdeProg.index');
    }



    public function create(){

        return view('dashboard.rdeProg.create');

    }



    public function store(RDEProgFormRequest $request)
    {
        $rdeProg = new RDEProg();
        $rdeProg->slug = Str::random(15);
        $year = OptionRDE::query()->where('slug','=',$request->year)->first();
        $rdeProg->year_slug = $year->slug;
        $rdeProg->year = $year->name;
        $rdeProg->date = $request->date;
        $rdeProg->file_title = $request->file_title;
        $rdeProg->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'sida_rde_prog/'. $rdeProg->crop_year.'/'.$client_original_filename;
            $rdeProg->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }


        $rdeProg->save();
        return redirect('dashboard/rdeProg/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(RDEProgFormRequest $request, $slug){
        $news = News::query()->where('slug',$slug)->first();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->img_url = $request->img_url;
        $news->date = $request->date;
        $news->date_start = $request->date_start;
        $news->date_end = $request->date_end;
        $news->update();
        return redirect('dashboard/rdeProg/edit');

    }


    public function destroy($slug){
        $rdeProg = RDEProg::query()->where('slug','=',$slug)->first();
        if(!empty($rdeProg)){
            $rdeProg->delete();
            return 1;
        }
        abort(503,'Error deleting RDE Program. [RDEController::destroy]');
        return 1;

        $rdeProg = RDEProg::query()->find($slug);
        if ($rdeProg->delete()){
            return 1;
        }
        abort(503, 'Error deleting of RDE Program!');

        return $rdeProg;
    }

    public function showLatest(){
        $latestData = RDEProg::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
