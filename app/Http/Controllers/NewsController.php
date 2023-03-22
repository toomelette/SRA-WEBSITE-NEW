<?php

namespace App\Http\Controllers;


use App\Models\News;
use App\Http\Requests\News\NewsFormRequest;
use App\Http\Requests\News\NewsFilterRequest;
use App\Models\NewsImage;
use App\Swep\ViewHelpers\__html;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;


class NewsController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $news = News::query()->orderByDesc('date');
            return DataTables::of($news)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.news.destroy","slug")."'";
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
        return view('dashboard.news.index');
    }



    public function create(){


        return view('dashboard.news.create');

    }



    public function store(NewsFormRequest $request)
    {
        $news = new News();
        $news->slug = Str::random(15);
        $news->title = $request->title;
        $news->description = $request->description;
        $id = $news->slug;

        if (!empty($request->img_url)) {
            foreach ($request->file('img_url') as $file) {
                $client_original_filename = $file->getClientOriginalName();
                $path = 'news_image/'. $id;

                $ni = new NewsImage;
                $ni->news_id = $news->slug;
                $ni->path = $path . '/' . $file->getClientOriginalName();
                $ni->created_at = Carbon::now();
//                $ni->user_created = $user_id;
                $ni->save();

                $original_ext = $file->getClientOriginalExtension();
                $original_file_name_only = str_replace('.' . $original_ext, '', $file->getClientOriginalName());
                $new_file_name_full = $original_file_name_only . '-' . Str::random(10) . '.' . $original_ext;
                $slug = Str::random();

                $file->storeAs($path, $client_original_filename);
            }
        }

        $news->date = Carbon::parse($request->date)->format('Y-m-d');
        $news->date_start = Carbon::parse($request->date_start)->format('Y-m-d');
        $news->date_end = Carbon::parse($request->date_end)->format('Y-m-d');
        $news->save();

        return redirect('dashboard/news/create');
    }


        public function edit($slug){
            $news = News::query()->where('slug',$slug)->first();
            return view('dashboard.news.edit')->with([
                'news' => $news,
            ]);
            return $this->news->edit($slug);

        }


        public function update(NewsFormRequest $request, $slug){
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


        public function newsRoute($id){
            $news = News::query()->where('id',$id)->first();
            $newsImage = NewsImage::query()->where('news_id', $news->slug)->first();
            return view('landingPage.news.index')->with([
                'news' => $news, 'newsImage' => $newsImage
            ]);
        }

    }
