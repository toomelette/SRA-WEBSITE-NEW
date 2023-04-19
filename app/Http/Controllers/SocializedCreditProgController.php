<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocializedCreditProg\SocializedCreditProgFormRequest;
use App\Http\Requests\SocializedCreditProg\SocializedCreditProgFilterRequest;
use App\Models\SocializedCreditProg;
use App\Models\Year;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class SocializedCreditProgController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $socialized_credit_prog = SocializedCreditProg::query()->orderByDesc('year');
            return DataTables::of($socialized_credit_prog)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.socializedCreditProg.destroy","slug")."'";
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
        return view('dashboard.socializedCreditProg.index');
    }



    public function create(){

        return view('dashboard.socializedCreditProg.create');

    }



    public function store(SocializedCreditProgFormRequest $request)
    {
        $socializedCreditProgram = new SocializedCreditProg();
        $socializedCreditProgram->slug = Str::random(15);
        $year = Year::query()->where('slug','=',$request->year)->first();
        $socializedCreditProgram->year_slug = $year->slug;
        $socializedCreditProgram->year = $year->name;
        $socializedCreditProgram->date = $request->date;
        $socializedCreditProgram->file_title = $request->file_title;
        $socializedCreditProgram->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'sida_socialized_credit_prog/'. $socializedCreditProgram->year;
                $socializedCreditProgram->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }

        $socializedCreditProgram->save();
        return redirect('dashboard/socializedCreditProg/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.news.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(SocializedCreditProgFormRequest $request, $slug){
        $news = News::query()->where('slug',$slug)->first();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->img_url = $request->img_url;
        $news->date = $request->date;
        $news->date_start = $request->date_start;
        $news->date_end = $request->date_end;
        $news->update();
        return redirect('dashboard/socializedCreditProg/edit');

    }


    public function destroy($slug){
        $socializedCreditProgram = SocializedCreditProg::query()->where('slug','=',$slug)->first();
        if(!empty($socializedCreditProgram)){
            $socializedCreditProgram->delete();
            return 1;
        }
        abort(503,'Error deleting Socialized Credit Program. [SocializedCreditProgController::destroy]');
        return 1;

        $socializedCreditProgram = SocializedCreditProg::query()->find($slug);
        if ($socializedCreditProgram->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Socialized Credit Program!');

        return $socializedCreditProgram;
    }

    public function showLatest(){
        $latestData = SocializedCreditProg::latest()->first();
        return view('latest_data', ['data' =>$latestData]);
    }




}
