<?php

namespace App\Swep\Repositories;
 

use App\Swep\BaseClasses\BaseRepository;
use App\Swep\Interfaces\SubNavInterface;

use App\Models\SubNav;

class SubNavRepository extends BaseRepository implements SubNavInterface {

    protected $subnav;

//	public function __construct(SubNav $subnav){
//
//        $this->subnav = $subnav;
//        parent::__construct();
//
//    }

    public function store($data, $navigation){

        $subnav = new SubNav();
        $subnav->slug = $this->str->random(16);
        //$submenu->submenu_id = $this->getSubmenuIdInc();
        $subnav->nav_main_slug = $navigation->slug;
        $subnav->name = $data['name'];
        $subnav->is_active = $this->__dataType->string_to_boolean($data['is_active']);
        $subnav->sequence = $this->__dataType->string_to_int($data['sequence']);
        $subnav->created_at = $this->carbon->now();
        $subnav->updated_at = $this->carbon->now();
        $subnav->ip_created = request()->ip();
        $subnav->ip_updated = request()->ip();
        $subnav->user_created = $this->auth->user()->user_id;
        $subnav->user_updated = $this->auth->user()->user_id;
        $subnav->save();
        
        return $subnav;

    }

    public function findBySubnavId($slug){

        $subnav = $this->cache->remember('sub_nav:findBySlug:' . $slug, 240, function() use ($slug){
            return $this->subnav->where('slug', $slug)->first();
        });
        
        if(empty($subnav)){
            abort(404);
        }
        
        return $subnav;
    }

    public function getSubnavIdInc(){

        $id = 'SN100001';

        $subnav = $this->subnav->select('slug')->orderBy('slug', 'desc')->first();

        if($subnav != null){
            $num = str_replace('SN', '', $subnav->subnav_id) + 1;
            $id = 'SN' . $num;
        }
        
        return $id;
        
    }
    public function getAll(){

        $subnav = $this->subnav->select('slug','nav_main_slug', 'name', 'is_active')->orderBy('slug', 'asc')->get();
        return $subnav;

    }

    public function getByNavId($nav_id){

        $subnav = $this->cache->remember('sub_nav:getByNavId:'. $nav_id .'', 240, function() use ($nav_id){

            return $this->subnav->select('slug', 'name')
                                 ->where('nav_main_slug', $nav_id)
                                 ->orderBy('slug', 'asc')
                                 ->get();

        });

        return $subnav;

    }
}