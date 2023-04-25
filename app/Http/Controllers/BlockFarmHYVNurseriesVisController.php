<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlockFarmHYVNurseriesVis\BlockFarmHYVNurseriesVisFilterRequest;
use App\Http\Requests\BlockFarmHYVNurseriesVis\BlockFarmHYVNurseriesVisFormRequest;
use App\Models\BlockFarmHYVNurseriesVis;
use App\Models\Year;
use App\Models\YearBlockFarm;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class BlockFarmHYVNurseriesVisController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $block_farm = BlockFarmHYVNurseriesVis::query()->orderByDesc('year');
            return DataTables::of($block_farm)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.blockFarmHYVNurseriesVis.destroy","slug")."'";
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
        return view('dashboard.blockFarmHYVNurseriesVis.index');
    }



    public function create(){

        return view('dashboard.blockFarmHYVNurseriesVis.create');

    }



    public function store(BlockFarmHYVNurseriesVisFormRequest $request)
    {
        $blockFarm = new BlockFarmHYVNurseriesVis();
        $blockFarm->slug = Str::random(15);
        $year = YearBlockFarm::query()->where('slug','=',$request->year)->first();
        $blockFarm->year_slug = $year->slug;
        $blockFarm->year = $year->name;
        $blockFarm->date = $request->date;
        $blockFarm->file_title = $request->file_title;
        $blockFarm->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'block_farm_visayas/'. $blockFarm->year;
                $blockFarm->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }
        $blockFarm->save();
        return redirect('dashboard/blockFarmHYVNurseriesVis/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(BlockFarmHYVNurseriesVisFormRequest $request, $slug){
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
        $blockFarm = BlockFarmHYVNurseriesVis::query()->where('slug','=',$slug)->first();
        if(!empty($blockFarm)){
            $blockFarm->delete();
            return 1;
        }
        abort(503,'Error deleting Block Farm Established. [BlockFarmHYVNurseriesVisController::destroy]');
        return 1;

        $blockFarm = BlockFarmHYVNurseriesVis::query()->find($slug);
        if ($blockFarm->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Block Farm !');

        return $blockFarm;
    }




}
