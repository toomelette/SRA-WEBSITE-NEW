<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticeProceed\NoticeProceedFormRequest;
use App\Http\Requests\NoticeProceed\NoticeProceedFilterRequest;
use App\Models\NoticeProceed;
use App\Models\CropYear;
use App\Models\Year;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class NoticeProceedController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $notice_proceed = NoticeProceed::query()->orderByDesc('crop_year');
            return DataTables::of($notice_proceed)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.noticeProceed.destroy","slug")."'";
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
        return view('dashboard.noticeProceed.index');
    }



    public function create(){

        return view('dashboard.noticeProceed.create');

    }



    public function store(NoticeProceedFormRequest $request)
    {
        $noticeProceed = new NoticeProceed();
        $noticeProceed->slug = Str::random(15);
        $cropYear = Year::query()->where('slug','=',$request->crop_year)->first();
        $noticeProceed->crop_year_slug = $cropYear->slug;
        $noticeProceed->crop_year = $cropYear->name;
        $noticeProceed->date = $request->date;
        $noticeProceed->file_title = $request->file_title;
        $noticeProceed->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'notice_proceed/'. $noticeProceed->crop_year;
                $noticeProceed->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }
        $noticeProceed->save();
        return redirect('dashboard/noticeProceed/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(NoticeProceedFormRequest $request, $slug){
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
        $noticeProceed = NoticeProceed::query()->where('slug','=',$slug)->first();
        if(!empty($noticeProceed)){
            $noticeProceed->delete();
            return 1;
        }
        abort(503,'Error deleting Notice of Proceed. [NoticeProceedController::destroy]');
        return 1;

        $noticeProceed = NoticeProceed::query()->find($slug);
        if ($noticeProceed->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Notice of Proceed!');

        return $noticeProceed;
    }

    public function showLatest(){
        $latestData = NoticeProceed::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
