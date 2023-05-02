<?php

namespace App\Http\Controllers;

use App\Http\Requests\StationBcdExtserv\StationBcdExtservFilterRequest;
use App\Http\Requests\StationBcdExtserv\StationBcdExtservFormRequest;
use App\Models\StationBcdExtserv;
use App\Models\User;
use App\Models\Year;
use App\Models\YearBlockFarm;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class StationBcdExtservController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $block_farm = StationBcdExtserv::query()->orderByDesc('year');
            return DataTables::of($block_farm)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.stationBcdExtserv.destroy","slug")."'";
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
        return view('dashboard.stationBcdExtserv.index');
    }



    public function create(){

        return view('dashboard.stationBcdExtserv.create');

    }



    public function store(StationBcdExtservFormRequest $request)
    {
        $station = new StationBcdExtserv();
        $station->slug = Str::random(15);
        $year = Year::query()->where('slug','=',$request->year)->first();
        $station->year_slug = $year->slug;
        $station->year = $year->name;
        $station->date = $request->date;
        $station->file_title = $request->file_title;
        $station->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'station_bcd_extserv/'. $station->year;
                $station->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }
        $station->save();
        return redirect('dashboard/stationBcdExtserv/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(StationBcdExtservFormRequest $request, $slug){
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
        $station = StationBcdExtserv::query()->where('slug','=',$slug)->first();
        if(!empty($station)){
            $station->delete();
            return 1;
        }
        abort(503,'Error deleting Station. [StationBcdEventController::destroy]');
        return 1;

        $station = StationBcdExtserv::query()->find($slug);
        if ($station->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Station!');

        return $station;
    }

    public function post($slug){

        $station = StationBcdExtserv::query()->where('slug','=',$slug)->first();
        if(!empty($station)){
            $station->update();
            return 1;
        }else{
            abort(500,'Error Posting!');
        }

    }






}
