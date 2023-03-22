<?php


namespace App\Http\Controllers;

use App\Models\PowerCogeneration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PowerCogenerationController extends Controller
{
    protected $powerCogeneration;

    public function index(){
        if(request()->ajax()){
            $power_cogeneration = PowerCogeneration::get();
            return DataTables::of($power_cogeneration)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.powerCogeneration.destroy","slug")."'";
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
        return view('dashboard.powerCogeneration.index');
    }


    public function new_slug(){
        $slug = rand(10000000, 99999999);
        $validator = \Validator::make(['slug' => $slug],
            [
                'slug' => 'required|unique:power_cogeneration,slug',
            ]
        );
        if ($validator->fails()){
            return 0;
        }
        return $slug;
    }

    public function store(Request $request){
        $powerCogeneration = new PowerCogeneration();
        $powerCogeneration->slug = $this->new_slug();
        $powerCogeneration->business_name = $request->business_name;
        $powerCogeneration->business_address = $request->business_address;
        $powerCogeneration->plantsite_location = $request->plantsite_location;
        $powerCogeneration->contact_person = $request->contact_person;
        $powerCogeneration->contact_number = $request->contact_number;
        $powerCogeneration->email = $request->email;
        $powerCogeneration->created_at = Carbon::now();
        $powerCogeneration->updated_at = Carbon::now();
        $powerCogeneration->save();
    }

}