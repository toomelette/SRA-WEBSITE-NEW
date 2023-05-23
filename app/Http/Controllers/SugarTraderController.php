<?php


namespace App\Http\Controllers;

use App\Models\SugarTrader;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class SugarTraderController extends Controller
{
    protected $sugarTrader;

    public function index(){
        if(request()->ajax()){
            $sugar_trader = SugarTrader::query()->orderByDesc('created_at');
            return DataTables::of($sugar_trader)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.sugarTrader.destroy","slug")."'";
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
        return view('dashboard.sugarTrader.index');
    }


    public function new_slug(){
        $slug = rand(10000000, 99999999);
        $validator = \Validator::make(['slug' => $slug],
            [
                'slug' => 'required|unique:sugar_trader,slug',
            ]
        );
        if ($validator->fails()){
            return 0;
        }
        return $slug;
    }

    public function store(Request $request){
        $sugarTrader = new SugarTrader();
        $sugarTrader->slug = $this->new_slug();
        $sugarTrader->business_name = $request->business_name;
        $sugarTrader->business_address = $request->business_address;
        $sugarTrader->contact_person = $request->contact_person;
        $sugarTrader->email = $request->email;
        $sugarTrader->trader_type = $request->trader_type;
        $sugarTrader->created_at = Carbon::now();
        $sugarTrader->updated_at = Carbon::now();
        $sugarTrader->save();
    }

}