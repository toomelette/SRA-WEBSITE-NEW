<?php

namespace App\Http\Controllers;

use App\Http\Requests\GeneralAdministrativeOrder\GeneralAdministrativeOrderFormRequest;
use App\Http\Requests\GeneralAdministrativeOrder\GeneralAdministrativeOrderFilterRequest;
use App\Models\GeneralAdministrativeOrder;
use App\Models\MemorandumCircular;
use App\Models\SugarSupplyDemand;
use App\Models\Year;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class GeneralAdministrativeOrderController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $general_administrative_order = GeneralAdministrativeOrder::query()->orderByDesc('year');
            return DataTables::of($general_administrative_order)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.generalAdministrativeOrder.destroy","slug")."'";
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
        return view('dashboard.generalAdministrativeOrder.index');
    }



    public function create(){

        return view('dashboard.generalAdministrativeOrder.create');

    }



    public function store(GeneralAdministrativeOrderFormRequest $request)
    {
        $generalAdministrativeOrder = new GeneralAdministrativeOrder();
        $generalAdministrativeOrder->slug = Str::random(15);
        $year = Year::query()->where('slug','=',$request->year)->first();
        $generalAdministrativeOrder->year = $year->name;
        $generalAdministrativeOrder->date = $request->date;
        $generalAdministrativeOrder->file_title = $request->file_title;
        $generalAdministrativeOrder->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'general_administrative_order/'. $generalAdministrativeOrder->crop_year.'/'.$client_original_filename;
            $generalAdministrativeOrder->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $generalAdministrativeOrder->save();
        return redirect('dashboard/generalAdministrativeOrder/create');
    }


        public function edit($slug){
            $news = News::query()->where('slug',$slug)->first();
            return view('dashboard.news.edit')->with([
                'news' => $news,
            ]);
            return $this->news->edit($slug);

        }


        public function update(GeneralAdministrativeOrderFormRequest $request, $slug){
            $news = News::query()->where('slug',$slug)->first();
            $news->title = $request->title;
            $news->description = $request->description;
            $news->img_url = $request->img_url;
            $news->date = $request->date;
            $news->date_start = $request->date_start;
            $news->date_end = $request->date_end;
            $news->update();
            return redirect('dashboard/generalAdministrativeOrder/edit');

        }


    public function destroy($slug){
        $generalAdministrativeOrder = GeneralAdministrativeOrder::query()->where('slug','=',$slug)->first();
        if(!empty($generalAdministrativeOrder)){
            $generalAdministrativeOrder->delete();
            return 1;
        }
        abort(503,'Error deleting General Administrative Order. [GeneralAdministrativeOrderController::destroy]');
        return 1;

        $generalAdministrativeOrder = GeneralAdministrativeOrder::query()->find($slug);
        if ($generalAdministrativeOrder->delete()){
            return 1;
        }
        abort(503, 'Error deleting of General Administrative Order!');

        return $generalAdministrativeOrder;
    }

    public function showLatest(){
        $latestData = GeneralAdministrativeOrder::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




    }
