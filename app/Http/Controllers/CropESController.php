<?php

namespace App\Http\Controllers;

use App\Http\Requests\CropES\CropESFilterRequest;
use App\Http\Requests\CropES\CropESFormRequest;
use App\Models\CropEstimates;
use App\Models\CropYear;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class CropESController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $crop_ES = CropEstimates::query()->orderByDesc('crop_year');
            return DataTables::of($crop_ES)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.cropEstimatesStatistics.destroy","slug")."'";
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
        return view('dashboard.cropEstimatesStatistics.index');
    }



    public function create(){

        return view('dashboard.cropEstimatesStatistics.create');

    }



    public function store(CropESFormRequest $request)
    {
        $cropES = new CropEstimates();
        $cropES->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $cropES->crop_year_slug = $cropYear->slug;
        $cropES->crop_year = $cropYear->name;
        $cropES->file_title = $request->file_title;
        $cropES->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'crop_estimates_statistics/'. $cropES->crop_year;
                $cropES->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }

        $cropES->save();
        return redirect('dashboard/cropEstimatesStatistics/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(CropESFormRequest $request, $slug){
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
        $cropES = CropEstimates::query()->where('slug','=',$slug)->first();
        if(!empty($cropES)){
            $cropES->delete();
            return 1;
        }
        abort(503,'Error deleting Crop Estimates & Statistics. [SugarLawController::destroy]');
        return 1;

        $cropES = CropEstimates::query()->find($slug);
        if ($cropES->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Crop Estimates & Statistics!');

        return $cropES;
    }







}
