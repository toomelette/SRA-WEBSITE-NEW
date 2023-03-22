<?php

namespace App\Http\Controllers;

use App\Http\Requests\SugarcaneVarieties\SugarcaneVarietiesFormRequest;
use App\Models\SugarcaneVarieties;
use App\Models\SugarcaneVarietiesImage;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class SugarcaneVarietiesController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }

    public function index(){
        if(request()->ajax()){
            $application_form = ApplicationForm::query()->get();
            return DataTables::of($application_form)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.applicationForm.destroy","slug")."'";
                    $slug = "'".$data->slug."'";
//                    return '<div class="btn-group">
//
//                                <button type="button" onclick="delete_data('.$slug.','.$destroy_route.')" data="'.$data->slug.'" class="btn btn-sm btn-danger" data-toggle="tooltip" title="" data-placement="top" data-original-title="Delete">
//                                    <i class="fa fa-trash"></i>
//                                </button>
//                            </div>';
                    return '<div class="btn-group">
                                
                               
                            </div>';
                })
                ->setRowId('slug')
                ->escapeColumns([])
                ->toJson();
        }
        return view('dashboard.sugarcaneVarieties.index');
    }

    public function create(){
        return view('dashboard.sugarcaneVarieties.create');
    }

    public function store(SugarcaneVarietiesFormRequest $request)
    {
        $user_id = Auth::guard('web')->user()->user_id;

        $sugarcaneVarieties = new SugarcaneVarieties();
        $sugarcaneVarieties->slug = Str::random(15);
        $sugarcaneVarieties->name = $request->name;
        $sugarcaneVarieties->description = $request->description;
        $sugarcaneVarieties->habit_of_growth = $request->habit_of_growth;
        $sugarcaneVarieties->flowering = $request->flowering;
        $sugarcaneVarieties->leaf_characteristics = $request->leaf_characteristics;
        $sugarcaneVarieties->stalk_characteristics = $request->stalk_characteristics;
        $sugarcaneVarieties->yield_potential = $request->yield_potential;
        $sugarcaneVarieties->reaction_to_disease = $request->reaction_to_disease;
        $sugarcaneVarieties->remarks = $request->remarks;
        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'sugarcane_varieties_image/'. $sugarcaneVarieties->slug;

                $svi = new SugarcaneVarietiesImage();
                $svi->sugarcane_varieties_id = $sugarcaneVarieties->slug;
                $svi->path = $path . '/' . $file->getClientOriginalName();
                $svi->created_at = Carbon::now();
                $svi->user_created = $user_id;
                $svi->save();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }
        $sugarcaneVarieties->save();
        return redirect('dashboard/sugarcaneVarieties/create');
    }

        public function edit($slug){
            $news = News::query()->where('slug',$slug)->first();
            return view('dashboard.news.edit')->with([
                'news' => $news,
            ]);
            return $this->news->edit($slug);
        }

        public function update(ApplicationFormFormRequest $request, $slug){
            $news = News::query()->where('slug',$slug)->first();
            $news->title = $request->title;
            $news->description = $request->description;
            $news->img_url = $request->img_url;
            $news->date = $request->date;
            $news->date_start = $request->date_start;
            $news->date_end = $request->date_end;
            $news->update();
            return redirect('dashboard/applicationForm/edit');

        }

        public function destroy($slug){
            $news = MemorandumOrder::query()->where('slug',$slug)->first();
            $news->delete();
            return 1;
        }
    }
