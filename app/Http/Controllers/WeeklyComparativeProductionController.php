<?php

namespace App\Http\Controllers;
use App\Http\Requests\WeeklyComparativeProduction\WeeklyComparativeProductionFilterRequest;
use App\Http\Requests\WeeklyComparativeProduction\WeeklyComparativeProductionFormRequest;
use App\Models\WeeklyComparativeProduction;
use App\Models\CropYear;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class WeeklyComparativeProductionController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $weekly_comparative_production = WeeklyComparativeProduction::query()->orderByDesc('crop_year');
            return DataTables::of($weekly_comparative_production)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.weeklyComparativeProduction.destroy","slug")."'";
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
        return view('dashboard.weeklyComparativeProduction.index');
    }



    public function create(){

        return view('dashboard.weeklyComparativeProduction.create');

    }



    public function store(WeeklyComparativeProductionFormRequest $request)
    {
        $weeklyComparativeProduction = new WeeklyComparativeProduction();
        $weeklyComparativeProduction->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $weeklyComparativeProduction->crop_year_slug = $cropYear->slug;
        $weeklyComparativeProduction->crop_year = $cropYear->name;
        $weeklyComparativeProduction->date = $request->date;
        $weeklyComparativeProduction->file_title = $request->file_title;
        $weeklyComparativeProduction->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'weekly_comparative_production/'. $weeklyComparativeProduction->crop_year;
                $weeklyComparativeProduction->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }
        $weeklyComparativeProduction->save();
        return redirect('dashboard/weeklyComparativeProduction/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(WeeklyComparativeProductionFormRequest $request, $slug){
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
        $weeklyComparativeProduction = WeeklyComparativeProduction::query()->where('slug','=',$slug)->first();
        if(!empty($weeklyComparativeProduction)){
            $weeklyComparativeProduction->delete();
            return 1;
        }
        abort(503,'Error deleting Weekly Comparative Production. [WeeklyComparativeProductionController::destroy]');
        return 1;

        $weeklyComparativeProduction = WeeklyComparativeProduction::query()->find($slug);
        if ($weeklyComparativeProduction->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Weekly Comparative Production!');

        return $weeklyComparativeProduction;
    }

    public function showLatest(){
        $latestData = WeeklyComparativeProduction::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
