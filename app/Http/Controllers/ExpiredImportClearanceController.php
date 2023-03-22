<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpiredImportClearance\ExpiredImportClearanceFormRequest;
use App\Http\Requests\ExpiredImportClearance\ExpiredImportClearanceFilterRequest;
use App\Models\CropYear;
use App\Models\ExpiredImportClearance;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class ExpiredImportClearanceController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $expired_import_clearance = ExpiredImportClearance::query()->orderByDesc('crop_year');
            return DataTables::of($expired_import_clearance)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.expiredImportClearance.destroy","slug")."'";
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
        return view('dashboard.expiredImportClearance.index');
    }



    public function create(){

        return view('dashboard.expiredImportClearance.create');

    }



    public function store(ExpiredImportClearanceFormRequest $request)
    {
        $expiredImportClearance = new ExpiredImportClearance();
        $expiredImportClearance->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $expiredImportClearance->crop_year_slug = $cropYear->slug;
        $expiredImportClearance->crop_year = $cropYear->name;
        $expiredImportClearance->file_title = $request->file_title;
        $expiredImportClearance->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'expired_import_clearance/'. $expiredImportClearance->crop_year;
                $expiredImportClearance->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }

        $expiredImportClearance->save();
        return redirect('dashboard/expiredImportClearance/create');
    }


    public function edit($slug){
        $news = News::query()->where('slug',$slug)->first();
        return view('dashboard.expiredImportClearance.edit')->with([
            'news' => $news,
        ]);
        return $this->news->edit($slug);

    }


    public function update(ExpiredImportClearanceFormRequest $request, $slug){
        $news = News::query()->where('slug',$slug)->first();
        $news->title = $request->title;
        $news->description = $request->description;
        $news->img_url = $request->img_url;
        $news->date = $request->date;
        $news->date_start = $request->date_start;
        $news->date_end = $request->date_end;
        $news->update();
        return redirect('dashboard/expiredImportClearance/edit');

    }


    public function destroy($slug){
        $expiredImportClearance = ExpiredImportClearance::query()->where('slug','=',$slug)->first();
        if(!empty($expiredImportClearance)){
            $expiredImportClearance->delete();
            return 1;
        }
        abort(503,'Error deleting Expired Import Clearance. [ExpiredImportClearanceController::destroy]');
        return 1;

        $expiredImportClearance = ExpiredImportClearance::query()->find($slug);
        if ($expiredImportClearance->delete()){
            return 1;
        }
        abort(503, 'Error deleting of Expired Import Clearance!');

        return $expiredImportClearance;
    }







}
