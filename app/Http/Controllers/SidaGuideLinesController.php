<?php

namespace App\Http\Controllers;

use App\Http\Requests\SidaGuideLines\SidaGuideLinesFormRequest;
use App\Http\Requests\SidaGuideLines\SidaGuideLinesFilterRequest;
use App\Models\SidaGuideLines;
use App\Models\CropYear;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class SidaGuideLinesController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $sida_guide_lines = SidaGuideLines::query()->orderByDesc('crop_year');
            return DataTables::of($sida_guide_lines)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.sidaGuideLines.destroy","slug")."'";
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
        return view('dashboard.sidaGuideLines.index');
    }



    public function create(){

        return view('dashboard.sidaGuideLines.create');

    }



    public function store(SidaGuideLinesFormRequest $request)
    {
        $sidaGuideLines = new SidaGuideLines();
        $sidaGuideLines->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $sidaGuideLines->crop_year_slug = $cropYear->slug;
        $sidaGuideLines->crop_year = $cropYear->name;
        $sidaGuideLines->date = $request->date;
        $sidaGuideLines->file_title = $request->file_title;
        $sidaGuideLines->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'sida_guide_lines/'. $sidaGuideLines->crop_year;
                $sidaGuideLines->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }
        $sidaGuideLines->save();
        return redirect('dashboard/sidaGuideLines/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(SidaGuideLinesFormRequest $request, $slug){
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
        $sidaGuideLines = SidaGuideLines::query()->where('slug','=',$slug)->first();
        if(!empty($sidaGuideLines)){
            $sidaGuideLines->delete();
            return 1;
        }
        abort(503,'Error deleting SIDA Guidelines. [SidaGuideLinesController::destroy]');
        return 1;

        $sidaGuideLines = SidaGuideLines::query()->find($slug);
        if ($sidaGuideLines->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Sida Guidlines!');

        return $sidaGuideLines;
    }

    public function showLatest(){
        $latestData = SidaGuideLines::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
