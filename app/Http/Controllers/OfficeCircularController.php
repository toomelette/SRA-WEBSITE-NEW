<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfficeCircular\OfficeCircularFormRequest;
use App\Http\Requests\OfficeCircular\OfficeCircularFilterRequest;
use App\Models\OfficeCircular;
use App\Models\SugarSupplyDemand;
use App\Models\Year;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class OfficeCircularController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }

    public function index(){
        if(request()->ajax()){
            $office_circular = OfficeCircular::query()->orderByDesc('year');
            return DataTables::of($office_circular)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.officeCircular.destroy","slug")."'";
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
        return view('dashboard.officeCircular.index');
    }


    public function create(){

        return view('dashboard.officeCircular.create');

    }



    public function store(OfficeCircularFormRequest $request)
    {
        $officeCircular = new OfficeCircular();
        $officeCircular->slug = Str::random(15);
        $year = Year::query()->where('slug','=',$request->year)->first();
        $officeCircular->year_slug = $year->slug;
        $officeCircular->year = $year->name;
        $officeCircular->date = $request->date;
        $officeCircular->file_title = $request->file_title;
        $officeCircular->title = $request->title;
        $officeCircular->description = $request->description;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'office_circular/'. $officeCircular->crop_year.'/'.$client_original_filename;
            $officeCircular->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }


        $officeCircular->save();
        return redirect('dashboard/officeCircular/create');
    }


        public function edit($slug){
            $news = News::query()->where('slug',$slug)->first();
            return view('dashboard.news.edit')->with([
                'news' => $news,
            ]);
            return $this->news->edit($slug);

        }


        public function update(OfficeCircularFormRequest $request, $slug){
            $news = News::query()->where('slug',$slug)->first();
            $news->title = $request->title;
            $news->description = $request->description;
            $news->img_url = $request->img_url;
            $news->date = $request->date;
            $news->date_start = $request->date_start;
            $news->date_end = $request->date_end;
            $news->update();
            return redirect('dashboard/officeCircular/edit');

        }


    public function destroy($slug){
        $officeCircular = OfficeCircular::query()->where('slug','=',$slug)->first();
        if(!empty($officeCircular)){
            $officeCircular->delete();
            return 1;
        }
        abort(503,'Error deleting Office Circular. [OfficeCircularController::destroy]');
        return 1;

        $officeCircular = OfficeCircular::query()->find($slug);
        if ($officeCircular->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Office Circular!');

        return $officeCircular;
    }

    public function showLatest(){
        $latestData = OfficeCircular::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




    }
