<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemorandumCircular\MemorandumCircularFormRequest;
use App\Http\Requests\MemorandumCircular\MemorandumCircularFilterRequest;
use App\Models\MemorandumCircular;
use App\Models\SugarSupplyDemand;
use App\Models\Year;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class MemorandumCircularController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $memorandum_circular = MemorandumCircular::query()->orderByDesc('year');
            return DataTables::of($memorandum_circular)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.memorandumCircular.destroy","slug")."'";
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
        return view('dashboard.memorandumCircular.index');
    }



    public function create(){

        return view('dashboard.memorandumCircular.create');

    }



    public function store(MemorandumCircularFormRequest $request)
    {
        $memorandumCircular = new MemorandumCircular();
        $memorandumCircular->slug = Str::random(15);
        $year = Year::query()->where('slug','=',$request->year)->first();
        $memorandumCircular->year = $year->name;
        $memorandumCircular->date = $request->date;
        $memorandumCircular->file_title = $request->file_title;
        $memorandumCircular->title = $request->title;
        $memorandumCircular->description = $request->description;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'memorandum_circular/'. $memorandumCircular->crop_year.'/'.$client_original_filename;
            $memorandumCircular->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }


        $memorandumCircular->save();
        return redirect('dashboard/memorandumCircular/create');
    }


        public function edit($slug){
            $news = News::query()->where('slug',$slug)->first();
            return view('dashboard.news.edit')->with([
                'news' => $news,
            ]);
            return $this->news->edit($slug);

        }


        public function update(MemorandumCircularFormRequest $request, $slug){
            $news = News::query()->where('slug',$slug)->first();
            $news->title = $request->title;
            $news->description = $request->description;
            $news->img_url = $request->img_url;
            $news->date = $request->date;
            $news->date_start = $request->date_start;
            $news->date_end = $request->date_end;
            $news->update();
            return redirect('dashboard/memorandumCircular/edit');

        }


    public function destroy($slug){
        $memorandumCircular = MemorandumCircular::query()->where('slug','=',$slug)->first();
        if(!empty($memorandumCircular)){
            $memorandumCircular->delete();
            return 1;
        }
        abort(503,'Error deleting Memorandum Circular. [MemorandumCircularController::destroy]');
        return 1;

        $memorandumCircular = SugarSupplyDemand::query()->find($slug);
        if ($memorandumCircular->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Memorandum Circular!');

        return $memorandumCircular;
    }

    public function showLatest(){
        $latestData = MemorandumCircular::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




    }
