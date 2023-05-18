<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoadMap\RoadMapFilterRequest;
use App\Http\Requests\RoadMap\RoadMapFormRequest;
use App\Models\CropYear;
use App\Models\MemorandumOrder;
use App\Models\RoadMap;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class RoadMapController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $road_map = RoadMap::query()->orderByDesc('crop_year');
            return DataTables::of($road_map)

                ->addColumn('sequence', function($data){
                    return '<div class="badge">'.$data->sequence.'</div>';

                })

                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.roadMap.destroy","slug")."'";
                    $slug = "'".$data->slug."'";
                    return '<div class="btn-group">

                        <button type="button" data="'.$data->slug.'" class="btn btn-default btn-sm edit_roadMap_btn" data-toggle="modal" data-target="#edit_roadMap_modal" title="" data-placement="top" data-original-title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                <button type="button" onclick="delete_data('.$slug.','.$destroy_route.')" data="'.$data->slug.'" class="btn btn-sm btn-danger" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>';

                })
                ->setRowId('slug')
                ->escapeColumns([])
                ->make(true);
        }
        return view('dashboard.roadMap.index');
    }



    public function create(){

        return view('dashboard.roadMap.create');

    }



    public function store(RoadMapFormRequest $request)
    {
        $roadMap = new RoadMap();
        $roadMap->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $roadMap->crop_year_slug = $cropYear->slug;
        $roadMap->crop_year = $cropYear->name;
        $roadMap->date = $request->date;
        $roadMap->file_title = $request->file_title;
        $roadMap->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'road_map/'. $roadMap->crop_year;
                $roadMap->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }

        $roadMap->save();
        return redirect('dashboard/roadMap/create');
    }


    public function edit($slug){
        $roadMap = RoadMap::query()->where('slug',$slug)->first();
        return view('dashboard.roadMap.edit')->with([
            'roadMap' => $roadMap,
        ]);
        return $this->roadMap->edit($slug);

    }


    public function update(RoadMapFormRequest $request, $slug){
        $roadMap = RoadMap::query()->where('slug',$slug)->first();
        $roadMap->title = $request->title;
        $roadMap->description = $request->description;
        $roadMap->img_url = $request->img_url;
        $roadMap->date = $request->date;
        $roadMap->date_start = $request->date_start;
        $roadMap->date_end = $request->date_end;
        $roadMap->update();
        return redirect('dashboard/roadMap/edit');

    }


    public function destroy($slug){
        $roadMap = RoadMap::query()->where('slug','=',$slug)->first();
        if(!empty($roadMap)){
            $roadMap->delete();
            return 1;
        }
        abort(503,'Error deleting Roadmap. [RoadMapController::destroy]');
        return 1;

        $roadMap = RoadMap::query()->find($slug);
        if ($roadMap->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Roadmap!');

        return $roadMap;
    }

    public function showLatest(){
        $latestData = RoadMap::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }







}
