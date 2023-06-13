<?php

namespace App\Http\Controllers;

use App\Http\Requests\ScholarshipProg\ScholarshipProgFormRequest;
use App\Http\Requests\ScholarshipProg\ScholarshipProgFilterRequest;
use App\Models\OptionScholarship;
use App\Models\ScholarshipProg;
use App\Models\Visitors;
use App\Models\Year;
use App\Models\YearBlockFarm;
use App\Swep\ViewHelpers\__html;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;


class VisitorsController extends Controller{

    protected $news;

//    public function __construct(NavigationService $navigation){
//
//    $this->navigation = $navigation;
//
//    }


    public function index(){
        if(request()->ajax()){
            $visitors = Visitors::query()->get();
            return DataTables::of($visitors)
                ->setRowId('slug')
                ->escapeColumns([])
                ->toJson();
        }
        return view('dashboard.visitors.index');
    }






}
