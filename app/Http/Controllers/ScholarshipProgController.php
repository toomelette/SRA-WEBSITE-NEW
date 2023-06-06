<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScholarshipProg\ScholarshipProgFormRequest;
use App\Http\Requests\ScholarshipProg\ScholarshipProgFilterRequest;
use App\Models\OptionScholarship;
use App\Models\ScholarshipProg;
use App\Models\Year;
use App\Models\YearBlockFarm;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class ScholarshipProgController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $scholarship_prog = ScholarshipProg::query()->orderByDesc('year');
            return DataTables::of($scholarship_prog)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.scholarshipProg.destroy","slug")."'";
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
        return view('dashboard.scholarshipProg.index');
    }



    public function create(){

        return view('dashboard.scholarshipProg.create');

    }



    public function store(ScholarshipProgFormRequest $request)
    {
        $scholarshipProgram = new ScholarshipProg();
        $scholarshipProgram->slug = Str::random(15);
        $year = OptionScholarship::query()->where('slug','=',$request->year)->first();
        $scholarshipProgram->year_slug = $year->slug;
        $scholarshipProgram->year = $year->name;
        $scholarshipProgram->date = $request->date;
        $scholarshipProgram->file_title = $request->file_title;
        $scholarshipProgram->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'sida_scholarship_prog/'. $scholarshipProgram->crop_year.'/'.$client_original_filename;
            $scholarshipProgram->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $scholarshipProgram->save();
        return redirect('dashboard/scholarshipProg/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(ScholarshipProgFormRequest $request, $slug){
        $news = News::query()->where('slug',$slug)->first();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->img_url = $request->img_url;
        $news->date = $request->date;
        $news->date_start = $request->date_start;
        $news->date_end = $request->date_end;
        $news->update();
        return redirect('dashboard/scholarshipProg/edit');

    }


    public function destroy($slug){
        $scholarshipProgram = ScholarshipProg::query()->where('slug','=',$slug)->first();
        if(!empty($scholarshipProgram)){
            $scholarshipProgram->delete();
            return 1;
        }
        abort(503,'Error deleting Scholarship Program. [ScholarshipProgController::destroy]');
        return 1;

        $scholarshipProgram = ScholarshipProg::query()->find($slug);
        if ($scholarshipProgram->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Scholarship Program!');

        return $scholarshipProgram;
    }

    public function showLatest(){
        $latestData = ScholarshipProg::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
