<?php

namespace App\Http\Controllers;

use App\Http\Requests\BioEnergy\BioEnergyFilterRequest;
use App\Http\Requests\BioEnergy\BioEnergyFormRequest;
use App\Models\CropYear;
use App\Models\BioEnergy;
use App\Models\SugarOrder;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class Bio_EnergyController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $bio_energy = BioEnergy::query()->orderByDesc('crop_year');
            return DataTables::of($bio_energy)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.bio_energy.destroy","slug")."'";
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
        return view('dashboard.bio_energy.index');
    }



    public function create(){

        return view('dashboard.bio_energy.create');

    }



    public function store(BioEnergyFormRequest $request)
    {
        $bioEnergy = new BioEnergy();
        $bioEnergy->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $bioEnergy->crop_year_slug = $cropYear->slug;
        $bioEnergy->crop_year = $cropYear->name;
        $bioEnergy->date = $request->date;
        $bioEnergy->file_title = $request->file_title;
        $bioEnergy->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'bio_energy/'. $bioEnergy->crop_year.'/'.$client_original_filename;
            $bioEnergy->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $bioEnergy->save();
        return redirect('dashboard/bio_energy/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(BioEnergyFormRequest $request, $slug){
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
        $bioEnergy = BioEnergy::query()->where('slug','=',$slug)->first();
        if(!empty($bioEnergy)){
            $bioEnergy->delete();
            return 1;
        }
        abort(503,'Error deleting Bioenergy. [Bio_EnergyController::destroy]');
        return 1;

        $bioEnergy = BioEnergy::query()->find($slug);
        if ($bioEnergy->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Bioenergy!');

        return $bioEnergy;
    }





}
