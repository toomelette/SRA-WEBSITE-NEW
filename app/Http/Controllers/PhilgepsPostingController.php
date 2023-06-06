<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhilgepsPosting\PhilgepsPostingFormRequest;
use App\Http\Requests\PhilgepsPosting\PhilgepsPostingFilterRequest;
use App\Models\PhilgepsPosting;
use App\Models\CropYear;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class PhilgepsPostingController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $philgeps_posting = PhilgepsPosting::query()->orderByDesc('crop_year');
            return DataTables::of($philgeps_posting)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.philgepsPosting.destroy","slug")."'";
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
        return view('dashboard.philgepsPosting.index');
    }



    public function create(){

        return view('dashboard.philgepsPosting.create');

    }



    public function store(PhilgepsPostingFormRequest $request)
    {
        $philgepsPosting = new PhilgepsPosting();
        $philgepsPosting->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $philgepsPosting->crop_year_slug = $cropYear->slug;
        $philgepsPosting->crop_year = $cropYear->name;
        $philgepsPosting->date = $request->date;
        $philgepsPosting->file_title = $request->file_title;
        $philgepsPosting->title = $request->title;

        if (!empty($request->img_url)) {
            $file = $request->file('img_url');
            $client_original_filename = $file->getClientOriginalName();
            $path = 'philgeps_posting/'. $philgepsPosting->crop_year.'/'.$client_original_filename;
            $philgepsPosting->path = $path;
            \Storage::disk('local')->put($path,$file->get());
        }

        $philgepsPosting->save();
        return redirect('dashboard/philgepsPosting/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(PhilgepsPostingFormRequest $request, $slug){
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
        $philgepsPosting = PhilgepsPosting::query()->where('slug','=',$slug)->first();
        if(!empty($philgepsPosting)){
            $philgepsPosting->delete();
            return 1;
        }
        abort(503,'Error deleting Philgeps Posting. [PhilgepsPostingController::destroy]');
        return 1;

        $philgepsPosting = PhilgepsPosting::query()->find($slug);
        if ($philgepsPosting->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Philgeps Posting!');

        return $philgepsPosting;
    }

    public function showLatest(){
        $latestData = PhilgepsPosting::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
