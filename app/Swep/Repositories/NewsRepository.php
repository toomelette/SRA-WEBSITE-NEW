<?php

namespace App\Swep\Repositories;
 
use App\Models\News;
use App\Swep\BaseClasses\BaseRepository;
use App\Swep\Interfaces\NewsInterface;


class NewsRepository extends BaseRepository implements NewsInterfaceInterface {

    protected $news;


	public function __construct(News $news){

        $this->news = $news;
        parent::__construct();
    }

    public function fetch($request){
        $key = str_slug($request->fullUrl(), '_');
        $entries = isset($request->e) ? $request->e : 20;

        $news = $this->cache->remember('news:fetch:' . $key, 240, function() use ($request, $entries){

            $news = $this->news->newQuery();
            
            if(isset($request->q)){
                $this->search($news, $request->q);
            }

            return $this->populate($news, $entries);

        });

        return $news;
    }

    public function store($request){

        $news = new News();
        $news->id = $this->getNewsIdInc();
        $news->slug = $this->str->random(16);
        $news->title = $request->title;
        $news->description = $request->description;
        $news->img_url = $request->img_url;
        $news->date = $request->date;
        $news->date_start = $request->date_start;
        $news->date_end = $request->date_end;
        $news->created_at = $this->carbon->now();
        $news->updated_at = $this->carbon->now();
        $news->ip_created = request()->ip();
        $news->ip_updated = request()->ip();
        $news->user_created = $this->auth->user()->user_id;
        $news->user_updated = $this->auth->user()->user_id;
        $news->save();

        return $news;

    }

    public function update($request, $slug){

        $news = $this->findBySlug($slug);
        $news->title = $request->title;
        $news->description = $request->description;
        $news->img_url = $request->img_url;
        $news->date = $request->date;
        $news->date_start = $request->date_start;
        $news->date_end = $request->date_end;
        $news->updated_at = $this->carbon->now();
        $news->ip_updated = request()->ip();
        $news->user_updated = $this->auth->user()->user_id;
        $news->save();

        return $news;

    }

    public function destroy($slug){

        $news = $this->findBySlug($slug);
        $news->delete();

        return $news;

    }

    public function findBySlug($slug){

        $news = $this->cache->remember('news:findBySlug:' . $slug, 240, function() use ($slug){
            return $this->news->where('slug', $slug)->first();
        }); 
        
        if(empty($news)){
            abort(404);
        }

        return $news;

    }

    public function findById($slug){

        $news = $this->cache->remember('news:findBySlug:' . $slug, 240, function() use ($slug){
            return $this->news->where('slug', $slug)->first();
        });
        
        if(empty($news)){
            abort(404);
        }
        
        return $news;

    }

    public function search($model, $key){

        return $model->where(function ($model) use ($key) {
                $model->where('name', 'LIKE', '%'. $key .'%');
        });

    }

    public function populate($model, $entries){
        return $model->select('name', 'slug')
                     ->sortable()
                     ->orderBy('updated_at', 'desc')
                     ->paginate($entries);

    }

    public function getNewsIdInc(){
        $id = 'N10001';
        $news = $this->menu->select('slug')->orderBy('slug', 'desc')->first();
        if($news != null){
            if($news->slug != null){
                $num = str_replace('N', '', $news->slug) + 1;
                $id = 'N' . $num;
            }
        }
        return $id;
    }

    public function getAll(){
        $news = $this->cache->remember('news:getAll', 240, function(){
            return $this->news->select('id', 'name')->get();
        });
        return $news;
    }

}