<?php

namespace App\Http\Controllers;

use App\Http\Requests\MillingSchedule\MillingScheduleFormRequest;
use App\Http\Requests\MillingSchedule\MillingScheduleFilterRequest;
use App\Models\MillingShedule;
use App\Models\CropYear;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class MillingScheduleController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $milling_schedule = MillingShedule::query()->orderByDesc('crop_year');
            return DataTables::of($milling_schedule)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.millingSchedule.destroy","slug")."'";
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
        return view('dashboard.millingSchedule.index');
    }



    public function create(){

        return view('dashboard.millingSchedule.create');

    }



    public function store(MillingScheduleFormRequest $request)
    {
        $millingSchedule = new MillingShedule();
        $millingSchedule->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $millingSchedule->crop_year_slug = $cropYear->slug;
        $millingSchedule->crop_year = $cropYear->name;
        $millingSchedule->date = $request->date;
        $millingSchedule->file_title = $request->file_title;
        $millingSchedule->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'milling_schedule/'. $millingSchedule->crop_year.'/'.$client_original_filename;
            $millingSchedule->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $millingSchedule->save();
        return redirect('dashboard/millingSchedule/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(MillingScheduleFormRequest $request, $slug){
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
        $millingSchedule = MillingShedule::query()->where('slug','=',$slug)->first();
        if(!empty($millingSchedule)){
            $millingSchedule->delete();
            return 1;
        }
        abort(503,'Error deleting Milling Schedule [MillingScheduleController::destroy]');
        return 1;

        $millingSchedule = MillingShedule::query()->find($slug);
        if ($millingSchedule->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Milling Schedule!');

        return $millingSchedule;
    }

    public function showLatest(){
        $latestData = MillingShedule::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
