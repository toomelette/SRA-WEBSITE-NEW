<?php

namespace App\Http\Controllers;

use App\Http\Requests\SidaLaws\SidaLawsFormRequest;
use App\Http\Requests\SidaLaws\SidaLawsFilterRequest;
use App\Models\SidaLaws;
use App\Models\CropYear;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class SidaLawsController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $sida_laws = SidaLaws::query()->orderByDesc('crop_year');
            return DataTables::of($sida_laws)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.sidaLaws.destroy","slug")."'";
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
        return view('dashboard.sidaLaws.index');
    }



    public function create(){

        return view('dashboard.sidaLaws.create');

    }



    public function store(SidaLawsFormRequest $request)
    {
        $sidaLaws = new SidaLaws();
        $sidaLaws->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $sidaLaws->crop_year_slug = $cropYear->slug;
        $sidaLaws->crop_year = $cropYear->name;
        $sidaLaws->date = $request->date;
        $sidaLaws->file_title = $request->file_title;
        $sidaLaws->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'sida_laws/'. $sidaLaws->crop_year.'/'.$client_original_filename;
            $sidaLaws->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $sidaLaws->save();
        return redirect('dashboard/sidaLaws/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(SidaLawsFormRequest $request, $slug){
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
        $sidaLaws = SidaLaws::query()->where('slug','=',$slug)->first();
        if(!empty($sidaLaws)){
            $sidaLaws->delete();
            return 1;
        }
        abort(503,'Error deleting Sida Laws. [SidaLawsController::destroy]');
        return 1;

        $sidaLaws = SidaLaws::query()->find($slug);
        if ($sidaLaws->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Sida Laws!');

        return $sidaLaws;
    }

    public function showLatest(){
        $latestData = SidaLaws::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
