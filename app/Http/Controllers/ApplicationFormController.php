<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationForm\ApplicationFormFilterRequest;
use App\Http\Requests\ApplicationForm\ApplicationFormFormRequest;
use App\Models\ApplicationForm;
use App\Models\Year;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class ApplicationFormController extends Controller{

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
        return view('dashboard.applicationForm.index');
    }


    public function create(){

        return view('dashboard.applicationForm.create');

    }



    public function store(ApplicationFormFormRequest $request)
    {
        $applicationForm = new ApplicationForm();
        $applicationForm->slug = Str::random(15);
        $applicationForm->file_title = $request->file_title;
        $applicationForm->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'application_form/' .  $applicationForm->slug;
                $applicationForm->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }

        $applicationForm->save();
        return redirect('dashboard/applicationForm/create');
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
