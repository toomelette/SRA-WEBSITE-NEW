<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplementalBid\SupplementalBidFormRequest;
use App\Http\Requests\SupplementalBid\SupplementalBidFilterRequest;
use App\Models\SupplementalBid;
use App\Models\CropYear;
use App\Models\Year;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class SupplementalBidController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $supplemental_bid = SupplementalBid::query()->orderByDesc('crop_year');
            return DataTables::of($supplemental_bid)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.supplementalBid.destroy","slug")."'";
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
        return view('dashboard.supplementalBid.index');
    }



    public function create(){

        return view('dashboard.supplementalBid.create');

    }



    public function store(SupplementalBidFormRequest $request)
    {
        $supplementalBid = new SupplementalBid();
        $supplementalBid->slug = Str::random(15);
        $cropYear = Year::query()->where('slug','=',$request->crop_year)->first();
        $supplementalBid->crop_year_slug = $cropYear->slug;
        $supplementalBid->crop_year = $cropYear->name;
        $supplementalBid->date = $request->date;
        $supplementalBid->file_title = $request->file_title;
        $supplementalBid->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'supplemental_bid/'. $supplementalBid->crop_year.'/'.$client_original_filename;
            $supplementalBid->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $supplementalBid->save();
        return redirect('dashboard/supplementalBid/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(SupplementalBidFormRequest $request, $slug){
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
        $supplementalBid = SupplementalBid::query()->where('slug','=',$slug)->first();
        if(!empty($supplementalBid)){
            $supplementalBid->delete();
            return 1;
        }
        abort(503,'Error deleting Supplemental Bid. [SupplementalBidController::destroy]');
        return 1;

        $supplementalBid = SupplementalBid::query()->find($slug);
        if ($supplementalBid->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Supplemental Bid!');

        return $supplementalBid;
    }

    public function showLatest(){
        $latestData = SupplementalBid::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
