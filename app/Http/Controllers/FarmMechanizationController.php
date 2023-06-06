<?php

namespace App\Http\Controllers;

use App\Http\Requests\FarmMechanization\FarmMechanizationFormRequest;
use App\Http\Requests\FarmMechanization\FarmMechanizationFilterRequest;
use App\Models\FarmMechanization;
use App\Models\Year;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class FarmMechanizationController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $farm_mechanization = FarmMechanization::query()->orderByDesc('year');
            return DataTables::of($farm_mechanization)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.farmMechanization.destroy","slug")."'";
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
        return view('dashboard.farmMechanization.index');
    }



    public function create(){

        return view('dashboard.farmMechanization.create');

    }



    public function store(FarmMechanizationFormRequest $request)
    {
        $farmMechanization = new FarmMechanization();
        $farmMechanization->slug = Str::random(15);
        $year = Year::query()->where('slug','=',$request->year)->first();
        $farmMechanization->year_slug = $year->slug;
        $farmMechanization->year = $year->name;
        $farmMechanization->date = $request->date;
        $farmMechanization->file_title = $request->file_title;
        $farmMechanization->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'sida_farm_mechanization/'. $farmMechanization->crop_year.'/'.$client_original_filename;
            $farmMechanization->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }


        $farmMechanization->save();
        return redirect('dashboard/farmMechanization/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(FarmMechanizationFormRequest $request, $slug){
        $news = News::query()->where('slug',$slug)->first();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->img_url = $request->img_url;
        $news->date = $request->date;
        $news->date_start = $request->date_start;
        $news->date_end = $request->date_end;
        $news->update();
        return redirect('dashboard/farmMechanization/edit');

    }


    public function destroy($slug){
        $farmMechanization = FarmMechanization::query()->where('slug','=',$slug)->first();
        if(!empty($farmMechanization)){
            $farmMechanization->delete();
            return 1;
        }
        abort(503,'Error deleting Farm Mechanization. [FarmMechanizationController::destroy]');
        return 1;

        $farmMechanization = FarmMechanization::query()->find($slug);
        if ($farmMechanization->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Farm Mechanization!');

        return $farmMechanization;
    }

    public function showLatest(){
        $latestData = FarmMechanization::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
