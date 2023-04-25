<?php

namespace App\Http\Controllers;

use App\Http\Requests\FundUtilization\FundUtilizationFormRequest;
use App\Http\Requests\FundUtilization\FundUtilizationFilterRequest;
use App\Models\FundUtilization;
use App\Models\CropYear;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class FundUtilizationController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $fund_utilization = FundUtilization::query()->orderByDesc('crop_year');
            return DataTables::of($fund_utilization)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.fundUtilization.destroy","slug")."'";
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
        return view('dashboard.fundUtilization.index');
    }



    public function create(){

        return view('dashboard.fundUtilization.create');

    }



    public function store(FundUtilizationFormRequest $request)
    {
        $fundUtilization = new FundUtilization();
        $fundUtilization->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $fundUtilization->crop_year_slug = $cropYear->slug;
        $fundUtilization->crop_year = $cropYear->name;
        $fundUtilization->date = $request->date;
        $fundUtilization->file_title = $request->file_title;
        $fundUtilization->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'fund_utilization/'. $fundUtilization->crop_year;
                $fundUtilization->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }
        $fundUtilization->save();
        return redirect('dashboard/fundUtilization/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(FundUtilizationFormRequest $request, $slug){
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
        $fundUtilization = FundUtilization::query()->where('slug','=',$slug)->first();
        if(!empty($fundUtilization)){
            $fundUtilization->delete();
            return 1;
        }
        abort(503,'Error deleting Fund Utilization. [FundUtilizationController::destroy]');
        return 1;

        $fundUtilization = FundUtilization::query()->find($slug);
        if ($fundUtilization->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Fund Utilization!');

        return $fundUtilization;
    }

    public function showLatest(){
        $latestData = FundUtilization::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}