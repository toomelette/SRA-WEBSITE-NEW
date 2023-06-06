<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlockFarmEstablishedVisayas\BlockFarmEstablishedVisayasFilterRequest;
use App\Http\Requests\BlockFarmEstablishedVisayas\BlockFarmEstablishedVisayasFormRequest;
use App\Models\BlockFarmEstablishedVisayas;
use App\Models\Year;
use App\Models\YearBlockFarm;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class BlockFarmEstablishedVisayasController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $block_farm = BlockFarmEstablishedVisayas::query()->orderByDesc('year');
            return DataTables::of($block_farm)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.blockFarmEstablishedVisayas.destroy","slug")."'";
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
        return view('dashboard.blockFarmEstablishedVisayas.index');
    }



    public function create(){

        return view('dashboard.blockFarmEstablishedVisayas.create');

    }



    public function store(BlockFarmEstablishedVisayasFormRequest $request)
    {
        $blockFarm = new BlockFarmEstablishedVisayas();
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
            $path = 'block_farm_established_visayas/'. $blockFarm->crop_year.'/'.$client_original_filename;
            $blockFarm->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $blockFarm->save();
        return redirect('dashboard/blockFarmEstablishedVisayas/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(BlockFarmEstablishedVisayasFormRequest $request, $slug){
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
        $blockFarm = BlockFarmEstablishedVisayas::query()->where('slug','=',$slug)->first();
        if(!empty($blockFarm)){
            $blockFarm->delete();
            return 1;
        }
        abort(503,'Error deleting Block Farm Established. [BlockFarmEstablishedVisayasController::destroy]');
        return 1;

        $blockFarm = BlockFarmEstablishedVisayas::query()->find($slug);
        if ($blockFarm->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Block Farm !');

        return $blockFarm;
    }




}
