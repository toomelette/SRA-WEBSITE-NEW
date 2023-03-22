<?php

namespace App\Http\Controllers;

use App\Http\Requests\SugarLaw\SugarLawFilterRequest;
use App\Http\Requests\SugarLaw\SugarLawFormRequest;
use App\Models\CropYear;
use App\Models\SugarLaw;
use App\Models\SugarOrder;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class SugarLawController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $sugar_law = SugarLaw::query()->orderByDesc('crop_year');
            return DataTables::of($sugar_law)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.sugarLaw.destroy","slug")."'";
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
        return view('dashboard.sugarLaw.index');
    }



    public function create(){

        return view('dashboard.sugarLaw.create');

    }



    public function store(SugarLawFormRequest $request)
    {
        $sugarLaw = new SugarLaw();
        $sugarLaw->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $sugarLaw->crop_year_slug = $cropYear->slug;
        $sugarLaw->crop_year = $cropYear->name;
        $sugarLaw->file_title = $request->file_title;
        $sugarLaw->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'sugar_law/'. $sugarLaw->crop_year;
                $sugarLaw->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }

        $sugarLaw->save();
        return redirect('dashboard/sugarLaw/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(SugarLawFormRequest $request, $slug){
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
        $sugarLaw = SugarLaw::query()->where('slug','=',$slug)->first();
        if(!empty($sugarLaw)){
            $sugarLaw->delete();
            return 1;
        }
        abort(503,'Error deleting Sugar Law. [SugarLawController::destroy]');
        return 1;

        $sugarLaw = SugarLaw::query()->find($slug);
        if ($sugarLaw->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Sugar Law!');

        return $sugarLaw;
    }







}
