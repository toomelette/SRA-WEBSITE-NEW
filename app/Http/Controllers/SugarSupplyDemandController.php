<?php

namespace App\Http\Controllers;

use App\Http\Requests\SugarSupplyDemand\SugarSupplyDemandFormRequest;
use App\Http\Requests\SugarSupplyDemand\SugarSupplyDemandFilterRequest;
use App\Models\SugarOrder;
use App\Models\SugarSupplyDemand;
use App\Models\CropYear;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class SugarSupplyDemandController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $sugar_supply_demand = SugarSupplyDemand::query()->orderByDesc('crop_year');
            return DataTables::of($sugar_supply_demand)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.sugarSupplyDemand.destroy","slug")."'";
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
        return view('dashboard.sugarSupplyDemand.index');
    }



    public function create(){

        return view('dashboard.sugarSupplyDemand.create');

    }



    public function store(SugarSupplyDemandFormRequest $request)
    {
        $sugarSupplyDemand = new SugarSupplyDemand();
        $sugarSupplyDemand->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $sugarSupplyDemand->crop_year_slug = $cropYear->slug;
        $sugarSupplyDemand->crop_year = $cropYear->name;
        $sugarSupplyDemand->date = $request->date;
        $sugarSupplyDemand->file_title = $request->file_title;
        $sugarSupplyDemand->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'sugar_supply_demand/'. $sugarSupplyDemand->crop_year;
                $sugarSupplyDemand->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }
        $sugarSupplyDemand->save();
        return redirect('dashboard/sugarSupplyDemand/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(SugarSupplyDemandFormRequest $request, $slug){
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
        $sugarSupplyDemand = SugarSupplyDemand::query()->where('slug','=',$slug)->first();
        if(!empty($sugarSupplyDemand)){
            $sugarSupplyDemand->delete();
            return 1;
        }
        abort(503,'Error deleting Sugar Supply Demand. [SugarSupplyDemandderController::destroy]');
        return 1;

        $sugarSupplyDemand = SugarSupplyDemand::query()->find($slug);
        if ($sugarSupplyDemand->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Sugar Supply Demandr!');

        return $sugarSupplyDemand;
    }

    public function showLatest(){
        $latestData = SugarSupplyDemand::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
