<?php

namespace App\Http\Controllers;

use App\Http\Requests\MolassesOrder\MolassesOrderFilterRequest;
use App\Http\Requests\MolassesOrder\MolassesOrderFormRequest;
use App\Models\CropYear;
use App\Models\MolassesOrder;
use App\Models\SugarSupplyDemand;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class MolassesOrderController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $molasses_order = MolassesOrder::query()->orderByDesc('crop_year');
            return DataTables::of($molasses_order)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.molassesOrder.destroy","slug")."'";
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
        return view('dashboard.molassesOrder.index');
    }



    public function create(){

        return view('dashboard.molassesOrder.create');

    }



    public function store(MolassesOrderFormRequest $request)
    {
        $molassesOrder = new MolassesOrder();
        $molassesOrder->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $molassesOrder->crop_year_slug = $cropYear->slug;
        $molassesOrder->crop_year = $cropYear->name;
        $molassesOrder->date = $request->date;
        $molassesOrder->file_title = $request->file_title;
        $molassesOrder->title = $request->title;
        $molassesOrder->description = $request->description;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'molasses_order/'. $molassesOrder->crop_year.'/'.$client_original_filename;
            $molassesOrder->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $molassesOrder->save();
        return redirect('dashboard/molassesOrder/create');
    }


        public function edit($slug){
            $news = News::query()->where('slug',$slug)->first();
            return view('dashboard.news.edit')->with([
                'news' => $news,
            ]);
            return $this->news->edit($slug);

        }


        public function update(MolassesOrderFormRequest $request, $slug){
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
        $molassesOrder = MolassesOrder::query()->where('slug','=',$slug)->first();
        if(!empty($molassesOrder)){
            $molassesOrder->delete();
            return 1;
        }
        abort(503,'Error deleting Molasses Order. [MolassesOrderController::destroy]');
        return 1;

        $molassesOrder = MolassesOrder::query()->find($slug);
        if ($molassesOrder->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Molasses Order!');

        return $molassesOrder;
    }

    public function showLatest(){
        $latestData = MolassesOrder::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




    }
