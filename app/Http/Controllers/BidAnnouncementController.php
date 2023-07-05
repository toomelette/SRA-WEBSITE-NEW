<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidAnnouncement\BidAnnouncementFormRequest;
use App\Http\Requests\BidAnnouncement\BidAnnouncementFilterRequest;
use App\Models\BidAnnouncement;
use App\Models\CropYear;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class BidAnnouncementController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $bid_announcement = BidAnnouncement::query()->orderByDesc('crop_year');
            return DataTables::of($bid_announcement)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.bidAnnouncement.destroy","slug")."'";
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
        return view('dashboard.bidAnnouncement.index');
    }



    public function create(){

        return view('dashboard.bidAnnouncement.create');

    }



    public function store(BidAnnouncementFormRequest $request)
    {
        $bidAnnouncement = new BidAnnouncement();
        $bidAnnouncement->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $bidAnnouncement->crop_year_slug = $cropYear->slug;
        $bidAnnouncement->crop_year = $cropYear->name;
        $bidAnnouncement->date = $request->date;
        $bidAnnouncement->file_title = $request->file_title;
        $bidAnnouncement->title = $request->title;
        $bidAnnouncement->description = $request->description;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'bid_announcement/'. $bidAnnouncement->crop_year.'/'.$client_original_filename;
            $bidAnnouncement->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $bidAnnouncement->save();
        return redirect('dashboard/bidAnnouncement/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(BidAnnouncementFormRequest $request, $slug){
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
        $bidAnnouncement = BidAnnouncement::query()->where('slug','=',$slug)->first();
        if(!empty($bidAnnouncement)){
            $bidAnnouncement->delete();
            return 1;
        }
        abort(503,'Error deleting Bid Announcement. [BidAnnouncementController::destroy]');
        return 1;

        $bidAnnouncement = BidAnnouncement::query()->find($slug);
        if ($bidAnnouncement->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Bid Announcement!');

        return $bidAnnouncement;
    }

    public function showLatest(){
        $latestData = BidAnnouncement::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
