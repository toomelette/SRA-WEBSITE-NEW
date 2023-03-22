<?php

namespace App\Swep\Services;


use App\Models\SubNav;
use App\Swep\Interfaces\NavigationInterface;
use App\Swep\Interfaces\SubNavInterface;
use App\Swep\BaseClasses\BaseService;


class NavigationService extends BaseService{


    protected $navigation_repo;
    protected $subNav_repo;



//    public function __construct(NavigationInterface $navigation_repo, SubNavInterface $subNav_repo){
//
//        $this->navigation_repo = $navigation_repo;
//        $this->subNav_repo = $subNav_repo;
//        parent::__construct();
//
//    }





    public function fetch($request){
        $navigation = $this->navigation_repo->fetch($request);

        $request->flash();
        return view('dashboard.navigation.index')->with('navigation', $navigation);

    }


    public function store($request){

        $rows = $request->row;

        //$navigation = $this->navigation_repo->store($request);

        if(!empty($rows)){

            foreach ($rows as $row) {

                $subnav = new SubNav();
                $subnav->slug = $this->str->random(16);
                //$submenu->submenu_id = $this->getSubmenuIdInc();
                $subnav->nav_main_slug = $navigation->slug;
                $subnav->name = $data['name'];
                $subnav->is_active = $this->__dataType->string_to_boolean($data['is_active']);
                $subnav->created_at = $this->carbon->now();
                $subnav->updated_at = $this->carbon->now();
                $subnav->ip_created = request()->ip();
                $subnav->ip_updated = request()->ip();
                $subnav->user_created = $this->auth->user()->user_id;
                $subnav->user_updated = $this->auth->user()->user_id;
                $subnav->save();

            }
        }

        $this->event->fire('navigation.store');
        return redirect()->back();

    }






    public function edit($slug){

        $navigation = $this->navigation_repo->findbySlug($slug);
        return view('dashboard.navigation.edit')->with('navigation', $navigation);

    }






    public function update($request, $slug){

        $navigation = $this->navigation_repo->update($request, $slug);

        $this->event->fire('navigation.update', $navigation);
        return redirect()->route('dashboard.menu.index');

    }






    public function destroy($slug){

        $navigation = $this->navigation_repo->destroy($slug);

        $this->event->fire('navigation.destroy', $navigation);
        return redirect()->back();

    }






}