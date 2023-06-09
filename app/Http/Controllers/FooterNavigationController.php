<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class FooterNavigationController extends Controller{

    protected $footerNavigation;

    public function create(){
        return view('dashboard.footerNavigation.create');
    }

//    public function store(NavigationFormRequest $request){
//        $navigation = new Navigation();
//        $navigation->slug = Str::random(15);
//        $navigation->name = $request->name;
//        $navigation->route = $request->route;
//        $navigation->is_main = $request->is_main;
//        $navigation->is_active = $request->is_active;
//        $navigation->sequence = $request->sequence;
//        if($navigation->save()) {
//            if(!empty($request->rows)){
//                foreach ($request->rows as $row) {
//                    $subnav = new SubNav();
//                    $subnav->slug = Str::random(16);
//                    $subnav->nav_main_slug = $navigation->slug;
//                    $subnav->name = $row['sub_name'];
//                    $subnav->route = $row['sub_route'];
//                    $subnav->is_active = $row['sub_is_active'];
//                    $subnav->sequence = $row['sub_sequence'];
//                    $subnav->save();
//
//                }
//            }
//        }
//        return redirect('dashboard/navigation/create');
//    }

//    public function edit($slug){
//        $navigation = Navigation::with('SubNav')->where('slug',$slug)->first();
//        return view('dashboard.navigation.edit')->with([
//            'navigation' => $navigation,
//        ]);
//        return $this->navigation->edit($slug);
//
//    }
//
//    public function update(NavigationFormRequest $request, $slug){
//        $navigation = Navigation::query()->where('slug',$slug)->first();
//        $navigation->name = $request->name;
//        $navigation->route = $request->route;
//        $navigation->is_main = $request->is_main;
//        $navigation->is_active = $request->is_active;
//        $navigation->update();
//        return $navigation->only('slug');
//
//    }
//
//    public function destroy($slug){
//        $navigation = Navigation::query()->where('slug',$slug)->first();
//        $navigation->subnav()->delete();
//        $navigation->delete();
//        return 1;
//    }

    public function governmentWebsite(){
        return view('landingPage.governmentWebsite.index');
    }

    public function eriaAseanNtm(){
        return view('landingPage.eria.index');
    }

    public function navRoute(){
        return 1;
    }

}
