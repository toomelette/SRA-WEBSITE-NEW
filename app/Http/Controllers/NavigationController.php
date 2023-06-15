<?php

namespace App\Http\Controllers;

use App\Models\Navigation;
use App\Models\SubNav;
use App\Models\SugarOrder;
use App\Swep\Services\NavigationService;
use App\Http\Requests\Navigation\NavigationFormRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class NavigationController extends Controller{

    protected $navigation;

    public function __construct(NavigationService $navigation){
        $this->navigation = $navigation;
    }

    public function index(){
        if(request()->ajax()){
            $navigation = Navigation::get();
            return DataTables::of($navigation)
                ->addColumn('name',function($data){
                    return '<h5>'.$data->name.'</h5>';
                })
                ->addColumn('is_main',function($data){
                    if($data->is_main){
                        return '<h5 style="color: green">Yes</h5>';
                    }
                    else {
                        return '<h5 style="color: red">No</h5>';
                    }

                })
                ->addColumn('is_active',function($data){
                    if($data->is_active){
                        return '<h5 style="color: green">Yes</h5>';
                    }
                    else {
                        return '<h5 style="color: red">No</h5>';
                    }

                })
                ->addColumn('sequence', function($data){
                        return '<div class="badge">'.$data->sequence.'</div>';

                })
                ->addColumn('action',function($data){
                    $destroy_route = "'".route("dashboard.navigation.destroy","slug")."'";
                    $slug = "'".$data->slug."'";
                    $view = '';
                    $button = '<div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm list_subnavs_btn" navigation_id="'.$data->id.'" data="'.$data->slug.'" data-toggle="modal" data-target="#list_subnavs" title="" data-placement="left" data-original-title="Subnavs">
                                        <i class="fa fa-list"></i>
                                    </button>
                                   
                                    <button type="button" data="'.$data->slug.'" class="btn btn-default btn-sm edit_navigation_btn" data-toggle="modal" data-target="#edit_navigation_modal" title="Edit" data-placement="top">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    
                                    <button type="button" data="'.$data->slug.'" class="btn btn-sm btn-danger delete_user_btn" onclick="delete_data('.$slug.','.$destroy_route.')" data="'.$data->slug.'" data-toggle="tooltip" title="Delete" data-placement="top">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
                                      <span class="caret"></span></button>
                                      <ul class="dropdown-menu dropdown-menu-right" role="menu">                                        
                                        <li><a href="#" class="reset_password_btn" data="'.$data->slug.'" fullname="'.strtoupper($data->firstname).' '.strtoupper($data->lastname).'">Reset Password</a></li>
                                        '.$view.'
                                      </ul>
                                    </div>
                                    
                                </div>';
                    return $button;
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('dashboard.navigation.index');
    }

    public function create(){
        return view('dashboard.navigation.create');
    }

    public function store(NavigationFormRequest $request){
        $navigation = new Navigation();
        $navigation->slug = Str::random(15);
        $navigation->name = $request->name;
        $navigation->route = $request->route;
        $navigation->is_main = $request->is_main;
        $navigation->is_active = $request->is_active;
        $navigation->sequence = $request->sequence;
        if($navigation->save()) {
            if(!empty($request->rows)){
                foreach ($request->rows as $row) {
                    $subnav = new SubNav();
                    $subnav->slug = Str::random(16);
                    $subnav->nav_main_slug = $navigation->slug;
                    $subnav->name = $row['sub_name'];
                    $subnav->route = $row['sub_route'];
                    $subnav->is_active = $row['sub_is_active'];
                    $subnav->sequence = $row['sub_sequence'];
                    $subnav->save();

                }
            }
        }
        return redirect('dashboard/navigation/create');
    }

    public function edit($slug){
        $navigation = Navigation::with('SubNav')->where('slug',$slug)->first();
        return view('dashboard.navigation.edit')->with([
            'navigation' => $navigation,
        ]);
        return $this->navigation->edit($slug);

    }

    public function update(NavigationFormRequest $request, $slug){
        $navigation = Navigation::query()->where('slug',$slug)->first();
        $navigation->name = $request->name;
        $navigation->route = $request->route;
        $navigation->is_main = $request->is_main;
        $navigation->is_active = $request->is_active;
        $navigation->update();
        return $navigation->only('slug');

    }

    public function destroy($slug){
        $navigation = Navigation::query()->where('slug',$slug)->first();
        $navigation->subnav()->delete();
        $navigation->delete();
        return 1;
    }

    public function home(){
        return view('layouts.guest-master');
    }

    public function overview(){
        return view('landingPage.aboutUs.overview');
    }

    public function mandate(){
        return view('landingPage.aboutUs.mandate');
    }

    public function charter(){
        return view('landingPage.aboutUs.charter');
    }

    public function organizationalChart(){
        return view('landingPage.aboutUs.organizationalChart');
    }

    public function corporateObjectives(){
        return view('landingPage.aboutUs.corporateObjectives');
    }

    public function history(){
        return view('landingPage.aboutUs.history');
    }

    public function officials(){
        return view('landingPage.aboutUs.officials');
    }

    public function administrators(){
        return view('landingPage.aboutUs.administrators');
    }

    public function historicalStatistics(){
        return view('landingPage.historicalStatistics.index');
    }

    public function servicePledge(){
        return view('landingPage.service.servicePledge');
    }

    public function serviceOffered(){
        return view('landingPage.service.serviceOffered');
    }

    public function serviceGuide(){
        return view('landingPage.service.serviceGuide');
    }

    public function serviceFeeCharges(){
        return view('landingPage.service.serviceFeeCharges');
    }

    public function stations(){
        return view('landingPage.stations.index');
    }

    public function navRoute(){
        return 1;
    }






}