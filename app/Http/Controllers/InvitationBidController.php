<?php

namespace App\Http\Controllers;

use App\Http\Requests\InvitationBid\InvitationBidFormRequest;
use App\Http\Requests\InvitationBid\InvitationBidFilterRequest;
use App\Models\InvitationBid;
use App\Models\CropYear;
use App\Models\Year;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class InvitationBidController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $invitation_bid = InvitationBid::query()->orderByDesc('year');
            return DataTables::of($invitation_bid)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.invitationBid.destroy","slug")."'";
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
        return view('dashboard.invitationBid.index');
    }



    public function create(){

        return view('dashboard.invitationBid.create');

    }



    public function store(InvitationBidFormRequest $request)
    {
        $invitationBid = new InvitationBid();
        $invitationBid->slug = Str::random(15);
        $year = Year::query()->where('slug','=',$request->year)->first();
        $invitationBid->year_slug = $year->slug;
        $invitationBid->year = $year->name;
        $invitationBid->date = $request->date;
        $invitationBid->file_title = $request->file_title;
        $invitationBid->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'invitation_bid/'. $invitationBid->year;
                $invitationBid->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }
        $invitationBid->save();
        return redirect('dashboard/invitationBid/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(InvitationBid $request, $slug){
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
        $invitationBid = InvitationBid::query()->where('slug','=',$slug)->first();
        if(!empty($invitationBid)){
            $invitationBid->delete();
            return 1;
        }
        abort(503,'Error deleting Invitation Bid. [InvitationBidController::destroy]');
        return 1;

        $invitationBid = InvitationBid::query()->find($slug);
        if ($invitationBid->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Invitation Bid!');

        return $invitationBid;
    }

    public function showLatest(){
        $latestData = InvitationBid::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
