<?php


namespace App\Http\Controllers;

use App\Models\BioethanolProducer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BioethanolProducerController extends Controller
{
    protected $bioethanolProducer;

    public function index(){
        if(request()->ajax()){
            $bioethanol_producer = BioethanolProducer::get();
            return DataTables::of($bioethanol_producer)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.bioethanolProducer.destroy","slug")."'";
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
        return view('dashboard.bioethanolProducer.index');
    }


    public function new_slug(){
        $slug = rand(10000000, 99999999);
        $validator = \Validator::make(['slug' => $slug],
            [
                'slug' => 'required|unique:bioethanol_producer,slug',
            ]
        );
        if ($validator->fails()){
            return 0;
        }
        return $slug;
    }

    public function store(Request $request){
        $bioethanolProducer = new BioethanolProducer();
        $bioethanolProducer->slug = $this->new_slug();
        $bioethanolProducer->business_name = $request->business_name;
        $bioethanolProducer->business_address = $request->business_address;
        $bioethanolProducer->plantsite_location = $request->plantsite_location;
        $bioethanolProducer->contact_person = $request->contact_person;
        $bioethanolProducer->contact_number = $request->contact_number;
        $bioethanolProducer->email = $request->email;
        $bioethanolProducer->created_at = Carbon::now();
        $bioethanolProducer->updated_at = Carbon::now();
        $bioethanolProducer->save();
    }

}