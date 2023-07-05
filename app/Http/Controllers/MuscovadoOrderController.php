<?php

namespace App\Http\Controllers;

use App\Http\Requests\MuscovadoOrder\MuscovadoOrderFilterRequest;
use App\Http\Requests\MuscovadoOrder\MuscovadoOrderFormRequest;
use App\Models\CropYear;
use App\Models\MuscovadoOrder;
use App\Models\SugarSupplyDemand;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class MuscovadoOrderController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $muscovado_order = MuscovadoOrder::query()->orderByDesc('crop_year');
            return DataTables::of($muscovado_order)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.muscovadoOrder.destroy","slug")."'";
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
        return view('dashboard.muscovadoOrder.index');
    }



    public function create(){

        return view('dashboard.muscovadoOrder.create');

    }



    public function store(MuscovadoOrderFormRequest $request)
    {
        $muscovadoOrder = new MuscovadoOrder();
        $muscovadoOrder->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $muscovadoOrder->crop_year_slug = $cropYear->slug;
        $muscovadoOrder->crop_year = $cropYear->name;
        $muscovadoOrder->date = $request->date;
        $muscovadoOrder->file_title = $request->file_title;
        $muscovadoOrder->title = $request->title;
        $muscovadoOrder->description = $request->description;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'muscovado_order/'. $muscovadoOrder->crop_year.'/'.$client_original_filename;
            $muscovadoOrder->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $muscovadoOrder->save();
        return redirect('dashboard/muscovadoOrder/create');
    }


        public function edit($slug){
            $news = News::query()->where('slug',$slug)->first();
            return view('dashboard.news.edit')->with([
                'news' => $news,
            ]);
            return $this->news->edit($slug);

        }


        public function update(MuscovadoOrderFormRequest $request, $slug){
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
        $muscovadoOrder = MuscovadoOrder::query()->where('slug','=',$slug)->first();
        if(!empty($muscovadoOrder)){
            $muscovadoOrder->delete();
            return 1;
        }
        abort(503,'Error deleting Muscovado Order. [MuscovadoOrderController::destroy]');
        return 1;

        $muscovadoOrder = MuscovadoOrder::query()->find($slug);
        if ($muscovadoOrder->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Muscovado Order!');

        return $muscovadoOrder;
    }

    public function showLatest(){
        $latestData = MuscovadoOrder::Latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




    }
