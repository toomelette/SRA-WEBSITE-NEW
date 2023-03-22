<?php

namespace App\Swep\Repositories;
 
use App\Models\Navigation;
use App\Swep\BaseClasses\BaseRepository;


class NavigationRepository extends BaseRepository implements NavigationInterface {

    protected $navigation;


	public function __construct(Navigation $navigation){

        $this->navigation = $navigation;
        parent::__construct();
    }

    public function fetch($request){

        $key = str_slug($request->fullUrl(), '_');
        $entries = isset($request->e) ? $request->e : 20;

        $navigation = $this->cache->remember('nav_main:fetch:' . $key, 240, function() use ($request, $entries){

            $navigation = $this->navigation->newQuery();
            
            if(isset($request->q)){
                $this->search($navigation, $request->q);
            }

            return $this->populate($navigation, $entries);

        });

        return $navigation;
    }

    public function store($request){

        $navigation = new Navigation();
        $navigation->id = $this->getNavIdInc();
        $navigation->slug = $this->str->random(16);
        $navigation->name = $request->name;
        $navigation->is_main = $this->__dataType->string_to_boolean($request->is_main);
        $navigation->is_active = $this->__dataType->string_to_boolean($request->is_active);
        $navigation->sequence = $this->__dataType->string_to_int($request->sequence);
        $navigation->created_at = $this->carbon->now();
        $navigation->updated_at = $this->carbon->now();
        $navigation->ip_created = request()->ip();
        $navigation->ip_updated = request()->ip();
        $navigation->user_created = $this->auth->user()->user_id;
        $navigation->user_updated = $this->auth->user()->user_id;
        $navigation->save();
        
        return $navigation;

    }

    public function update($request, $slug){

        $navigation = $this->findBySlug($slug);
        $navigation->name = $request->name;
        $navigation->is_main = $this->__dataType->string_to_boolean($request->is_main);
        $navigation->is_active = $this->__dataType->string_to_boolean($request->is_active);
        $navigation->updated_at = $this->carbon->now();
        $navigation->ip_updated = request()->ip();
        $navigation->user_updated = $this->auth->user()->user_id;
        $navigation->save();

        return $navigation;

    }

    public function destroy($slug){

        $navigation = $this->findBySlug($slug);
        $navigation->delete();
        $navigation->subnav()->delete();

        return $navigation;

    }

    public function findBySlug($slug){

        $navigation = $this->cache->remember('nav_main:findBySlug:' . $slug, 240, function() use ($slug){
            return $this->navigation->where('slug', $slug)->first();
        }); 
        
        if(empty($navigation)){
            abort(404);
        }

        return $navigation;

    }

    public function findByNavId($slug){

        $navigation = $this->cache->remember('nav_main:findBySlug:' . $slug, 240, function() use ($slug){
            return $this->menu->where('slug', $slug)->first();
        });
        
        if(empty($navigation)){
            abort(404);
        }
        
        return $navigation;

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

    public function getNavIdInc(){
        $id = 'N10001';
        $navigation = $this->menu->select('slug')->orderBy('slug', 'desc')->first();
        if($navigation != null){
            if($navigation->slug != null){
                $num = str_replace('N', '', $navigation->slug) + 1;
                $id = 'N' . $num;
            }
        }
        return $id;
    }

    public function getAll(){
        $navigation = $this->cache->remember('nav_main:getAll', 240, function(){
            return $this->navigation->select('id', 'name')->get();
        });
        return $navigation;
    }

}