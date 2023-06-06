<?php

namespace App\Http\Controllers;

use App\Http\Requests\GAD_videos\GAD_videosFilterRequest;
use App\Http\Requests\GAD_videos\GAD_videosFormRequest;
use App\Models\GAD_videos;
use App\Models\User;
use App\Models\Year;
use App\Models\YearBlockFarm;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class GAD_videosController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $block_farm = GAD_videos::query()->orderByDesc('year');
            return DataTables::of($block_farm)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.GAD_videos.destroy","slug")."'";
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
        return view('dashboard.GAD_videos.index');
    }



    public function create(){

        return view('dashboard.GAD_videos.create');

    }



    public function store(GAD_videosFormRequest $request)
    {
        $request->validate([
            'video' => 'required|mimetypes:video/mp4,video/avi|max:50000' // adjust the mimetypes and max file size as needed
        ]);

        $station = new GAD_videos();
        $station->slug = Str::random(15);
        $year = Year::query()->where('slug','=',$request->year)->first();
        $station->year_slug = $year->slug;
        $station->year = $year->name;
        $station->date = $request->date;
        $station->file_title = $request->file_title;
        $station->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'gad_videos/'. $station->crop_year.'/'.$client_original_filename;
            $station->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $station->save();
        return redirect('dashboard/GAD_videos/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(GAD_videosFormRequest $request, $slug){
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
        $station = GAD_videos::query()->where('slug','=',$slug)->first();
        if(!empty($station)){
            $station->delete();
            return 1;
        }
        abort(503,'Error deleting Report. [GAD_videosController::destroy]');
        return 1;

        $station = GAD_videos::query()->find($slug);
        if ($station->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Report!');

        return $station;
    }

    public function post($slug){

        $station = GAD_videos::query()->where('slug','=',$slug)->first();
        if(!empty($station)){
            $station->update();
            return 1;
        }else{
            abort(500,'Error Posting!');
        }

    }






}
