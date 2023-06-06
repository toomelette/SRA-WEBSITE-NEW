<?php

namespace App\Http\Controllers;

use App\Http\Requests\SugarStatistics\SugarStatisticsFormRequest;
use App\Http\Requests\SugarStatistics\SugarStatisticsFilterRequest;
use App\Models\CropYear;
use App\Models\SugarStatistics;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class SugarStatisticsController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $sugar_statistics = SugarStatistics::query()->orderByDesc('crop_year');
            return DataTables::of($sugar_statistics)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.sugarStatistics.destroy","slug")."'";
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
        return view('dashboard.sugarStatistics.index');
    }



    public function create(){

        return view('dashboard.sugarStatistics.create');

    }



    public function store(SugarStatisticsFormRequest $request)
    {

        $sugarStatistics = new SugarStatistics();
        $sugarStatistics->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $sugarStatistics->crop_year_slug = $cropYear->slug;
        $sugarStatistics->date = $request->date;
        $sugarStatistics->crop_year = $cropYear->name;
        $sugarStatistics->file_title = $request->file_title;
        $sugarStatistics->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'sugar_statistics/'. $sugarStatistics->crop_year.'/'.$client_original_filename;
            $sugarStatistics->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $sugarStatistics->save();
        return redirect('dashboard/sugarStatistics/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(SugarStatisticsFormRequest $request, $slug){
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
        $sugarStatistics = SugarStatistics::query()->where('slug','=',$slug)->first();
        if(!empty($sugarStatistics)){
            $sugarStatistics->delete();
            return 1;
        }
        abort(503,'Error deleting Sugar Statistics. [SugarStatisticsController::destroy]');
        return 1;

        $sugarStatistics = SugarStatistics::query()->find($slug);
        if ($sugarStatistics->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Sugar Statistics!');

        return $sugarStatistics;
    }







}
