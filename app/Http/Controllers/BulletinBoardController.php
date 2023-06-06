<?php

namespace App\Http\Controllers;

use App\Http\Requests\BulletinBoard\StationBcdAnnFilterRequest;
use App\Http\Requests\BulletinBoard\BulletinBoardFormRequest;
use App\Models\BulletinBoard;
use App\Models\User;
use App\Models\Year;
use App\Models\YearBlockFarm;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class BulletinBoardController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $block_farm = BulletinBoard::query()->orderByDesc('year');
            return DataTables::of($block_farm)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.bulletinBoard.destroy","slug")."'";
                    $slug = "'".$data->slug."'";
                    return '<div class="btn-group">
                                <button type="button" onclick="delete_data('.$slug.','.$destroy_route.')" data="'.$data->slug.'" class="btn btn-sm btn-danger" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>';

                })

                /*PostBtn*/
                ->editColumn('Post', function ($data){
                    $checked = ($data->Post == 1) ? "checked": null;
                    return '<div class="TriSea-technologies-Switch pull-right">
                            <input data="'.$data->slug.'" id="TriSeaSuccess_'.$data->slug.'" name="sdad" class="ActiveButton" '.$checked.'  type="checkbox"  />
                            <label for="TriSeaSuccess_'.$data->slug.'" class="label-success"></label>
                        </div>';
                })
                /*EndPostBtn*/

                ->setRowId('slug')
                ->escapeColumns([])
                ->toJson();
        }
        return view('dashboard.bulletinBoard.index');
    }



    public function create(){

        return view('dashboard.bulletinBoard.create');

    }



    public function store(BulletinBoardFormRequest $request)
    {
        $blockFarm = new BulletinBoard();
        $blockFarm->slug = Str::random(15);
        $year = YearBlockFarm::query()->where('slug','=',$request->year)->first();
        $blockFarm->year_slug = $year->slug;
        $blockFarm->year = $year->name;
        $blockFarm->date = $request->date;
        $blockFarm->file_title = $request->file_title;
        $blockFarm->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'bulletin_board/'. $blockFarm->crop_year.'/'.$client_original_filename;
            $blockFarm->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $blockFarm->save();
        return redirect('dashboard/bulletinBoard/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(BulletinBoardFormRequest $request, $slug){
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
        $blockFarm = BulletinBoard::query()->where('slug','=',$slug)->first();
        if(!empty($blockFarm)){
            $blockFarm->delete();
            return 1;
        }
        abort(503,'Error deleting Bulletin Board. [BulletinBoardController::destroy]');
        return 1;

        $blockFarm = BulletinBoard::query()->find($slug);
        if ($blockFarm->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Bulletin Board !');

        return $blockFarm;
    }



                /*PostBtn function*/
    public function changeStatus($slug, Request $request){
        $bulletinBoard = BulletinBoard::query()->where('slug','=',$slug)->first();
        if(!empty($bulletinBoard)){
            $bulletinBoard->Post = ($request->active == 'true') ? 1 : 0 ;
            $bulletinBoard->update();
            return $bulletinBoard->only('slug');
        }else{
            abort(500,'Error Posting!');
        }
    }


}
