<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticeAward\NoticeAwardFormRequest;
use App\Http\Requests\NoticeAward\NoticeAwardFilterRequest;
use App\Models\NoticeAward;
use App\Models\CropYear;
use App\Models\Year;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class NoticeAwardController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $notice_award = NoticeAward::query()->orderByDesc('crop_year');
            return DataTables::of($notice_award)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.noticeAward.destroy","slug")."'";
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
        return view('dashboard.noticeAward.index');
    }



    public function create(){

        return view('dashboard.noticeAward.create');

    }



    public function store(NoticeAwardFormRequest $request)
    {
        $noticeAward = new NoticeAward();
        $noticeAward->slug = Str::random(15);
        $cropYear = Year::query()->where('slug','=',$request->crop_year)->first();
        $noticeAward->crop_year_slug = $cropYear->slug;
        $noticeAward->crop_year = $cropYear->name;
        $noticeAward->date = $request->date;
        $noticeAward->file_title = $request->file_title;
        $noticeAward->title = $request->title;
        $noticeAward->description = $request->description;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'notice_award/'. $noticeAward->crop_year.'/'.$client_original_filename;
            $noticeAward->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $noticeAward->save();
        return redirect('dashboard/noticeAward/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(NoticeAwardFormRequest $request, $slug){
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
        $noticeAward = NoticeAwardFormRequest::query()->where('slug','=',$slug)->first();
        if(!empty($noticeAward)){
            $noticeAward->delete();
            return 1;
        }
        abort(503,'Error deleting Notice of Award. [NoticeAwardController::destroy]');
        return 1;

        $noticeAward = NoticeAward::query()->find($slug);
        if ($noticeAward->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Notice of Award!');

        return $noticeAward;
    }

    public function showLatest(){
        $latestData = NoticeAward::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
