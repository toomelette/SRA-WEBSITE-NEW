<?php

namespace App\Http\Controllers;

use App\Http\Requests\VacantPosition\VacantPositionFormRequest;
use App\Http\Requests\VacantPosition\VacantPositionFilterRequest;
use App\Models\VacantPosition;
use App\Models\Year;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class VacantPositionController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $vacant_position = VacantPosition::query()->orderByDesc('year');
            return DataTables::of($vacant_position)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.vacantPosition.destroy","slug")."'";
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
        return view('dashboard.vacantPosition.index');
    }



    public function create(){

        return view('dashboard.vacantPosition.create');

    }



    public function store(VacantPositionFormRequest $request)
    {
        $vacantPosition = new VacantPosition();
        $vacantPosition->slug = Str::random(15);
        $year = Year::query()->where('slug','=',$request->year)->first();
        $vacantPosition->year_slug = $year->slug;
        $vacantPosition->year = $year->name;
        $vacantPosition->date = $request->date;
        $vacantPosition->file_title = $request->file_title;
        $vacantPosition->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'vacant_position/'. $vacantPosition->year;
                $vacantPosition->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }

        $vacantPosition->save();
        return redirect('dashboard/vacantPosition/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(VacantPositionFormRequest $request, $slug){
        $news = News::query()->where('slug',$slug)->first();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->img_url = $request->img_url;
        $news->date = $request->date;
        $news->date_start = $request->date_start;
        $news->date_end = $request->date_end;
        $news->update();
        return redirect('dashboard/vacantPosition/edit');

    }


    public function destroy($slug){
        $vacantPosition = VacantPosition::query()->where('slug','=',$slug)->first();
        if(!empty($vacantPosition)){
            $vacantPosition->delete();
            return 1;
        }
        abort(503,'Error deleting Vacant Position. [VacantPositionController::destroy]');
        return 1;

        $vacantPosition = VacantPosition::query()->find($slug);
        if ($vacantPosition->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Vacant Position!');

        return $vacantPosition;
    }

    public function showLatest(){
        $latestData = VacantPosition::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
