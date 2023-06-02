<?php

namespace App\Http\Controllers;

use App\Http\Requests\SugarOrder\SugarOrderFilterRequest;
use App\Http\Requests\SugarOrder\SugarOrderFormRequest;
use App\Models\CropYear;
use App\Models\SugarOrder;
use App\Swep\ViewHelpers\__html;
use http\Message;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class SugarOrderController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }
    public function index(){
        if(request()->ajax()){
            $sugar_order = SugarOrder::query()->orderByDesc('crop_year');
            return DataTables::of($sugar_order)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.sugarOrder.destroy","slug")."'";
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
        return view('dashboard.sugarOrder.index');
    }

    public function create(){

        return view('dashboard.sugarOrder.create');

    }



    public function store(SugarOrderFormRequest $request)
    {
        $sugarOrder = new SugarOrder();
        $sugarOrder->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $sugarOrder->crop_year_slug = $cropYear->slug;
        $sugarOrder->crop_year = $cropYear->name;
        $sugarOrder->file_title = $request->file_title;
        $sugarOrder->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {

                $client_original_filename = $file->getClientOriginalName();
                $path = 'sugar_order/'. $sugarOrder->crop_year;
                $sugarOrder->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }

        $sugarOrder->save();
        return redirect('dashboard/sugarOrder/create');
    }


        public function edit($slug){
            $news = News::query()->where('slug',$slug)->first();
            return view('dashboard.news.edit')->with([
                'news' => $news,
            ]);
            return $this->news->edit($slug);

        }


        public function update(SugarOrderFormRequest $request, $slug){
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
            $sugarOrder = SugarOrder::query()->where('slug','=',$slug)->first();
            if(!empty($sugarOrder)){
                $sugarOrder->delete();
                return 1;
            }
            abort(503,'Error deleting Sugar Order. [SugarOrderController::destroy]');
            return 1;

            $sugarOrder = SugarOrder::query()->find($slug);
            if ($sugarOrder->delete()){
                return 1;
            }
            abort(503, 'Error deleting of Sugar order!');

            return $sugarOrder;
        }




    }
