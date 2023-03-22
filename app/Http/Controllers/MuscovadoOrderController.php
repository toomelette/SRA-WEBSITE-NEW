<?php

namespace App\Http\Controllers;

use App\Http\Requests\MuscovadoOrder\MuscovadoOrderFilterRequest;
use App\Http\Requests\MuscovadoOrder\MuscovadoOrderFormRequest;
use App\Models\CropYear;
use App\Models\MuscovadoOrder;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class MuscovadoOrderController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $muscovado_order = MuscovadoOrder::query()->orderByDesc('crop_year');
            return DataTables::of($muscovado_order)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.muscovadoOrder.destroy","slug")."'";
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
        return view('dashboard.muscovadoOrder.index');
    }



    public function create(){

        return view('dashboard.muscovadoOrder.create');

    }



    public function store(MuscovadoOrderFormRequest $request)
    {
        $muscovadoOrder = new MuscovadoOrder();
        $muscovadoOrder->slug = Str::random(15);
        $cropYear = CropYear::query()->where('slug','=',$request->crop_year)->first();
        $muscovadoOrder->crop_year_slug = $cropYear->slug;
        $muscovadoOrder->crop_year = $cropYear->name;
        $muscovadoOrder->file_title = $request->file_title;
        $muscovadoOrder->title = $request->title;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'muscovado_order/'. $muscovadoOrder->crop_year;
                $muscovadoOrder->path = $path . '/' . $file->getClientOriginalName();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }

        $muscovadoOrder->save();
        return redirect('dashboard/muscovadoOrder/create');
    }


        public function edit($slug){
            $news = News::query()->where('slug',$slug)->first();
            return view('dashboard.news.edit')->with([
                'news' => $news,
            ]);
            return $this->news->edit($slug);

        }


        public function update(MolassesOrderFormRequest $request, $slug){
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
            $news = News::query()->where('slug',$slug)->first();
            $news->delete();
            return 1;
        }




    }
