<?php

namespace App\Http\Controllers;

use App\Http\Requests\BioethanolReferencePrice\bioethanolRPFilterRequest;
use App\Http\Requests\BioethanolReferencePrice\bioethanolRPFormRequest;
use App\Models\BioethanolReferencePrice;
use App\Models\CropYear;
use App\Models\SugarOrder;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class BioethanolRPController extends Controller{


    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $bioethanol_RP = BioethanolReferencePrice::query()->orderByDesc('crop_year');
            return DataTables::of($bioethanol_RP)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.bioethanolReferencePrice.destroy","slug")."'";
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
        return view('dashboard.bioethanolReferencePrice.index');
    }



    public function create(){

        return view('dashboard.bioethanolReferencePrice.create');

    }



    public function store(bioethanolRPFormRequest $request)
    {
        $bioethanolRP = new BioethanolReferencePrice();
        $bioethanolRP->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $bioethanolRP->crop_year_slug = $cropYear->slug;
        $bioethanolRP->crop_year = $cropYear->name;
        $bioethanolRP->date = $request->date;
        $bioethanolRP->file_title = $request->file_title;
        $bioethanolRP->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'bioethanol_reference_price/'. $bioethanolRP->crop_year.'/'.$client_original_filename;
            $bioethanolRP->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $bioethanolRP->save();
        return redirect('dashboard/bioethanolReferencePrice/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(bioethanolRPFormRequest $request, $slug){
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
        $bioethanolRP = BioethanolReferencePrice::query()->where('slug','=',$slug)->first();
        if(!empty($bioethanolRP)){
            $bioethanolRP->delete();
            return 1;
        }
        abort(503,'Error deleting Bioetjanol Reference Price. [BioethanolRPController::destroy]');
        return 1;

        $bioethanolRP = BioethanolReferencePrice::query()->find($slug);
        if ($bioethanolRP->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Bioetjanol Reference Price!');

        return $bioethanolRP;
    }




}
