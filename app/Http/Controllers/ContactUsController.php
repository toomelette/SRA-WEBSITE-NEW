<?php


namespace App\Http\Controllers;

use App\Models\ContactUs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactUsController extends Controller
{
    protected $contactUs;

    public function index(){
        if(request()->ajax()){
            $contact_us = ContactUs::query()->orderByDesc('created_at');
            return DataTables::of($contact_us)
                ->addColumn('action',function ($data){
                    $destroy_route = "'".route("dashboard.contactUs.destroy","slug")."'";
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
        return view('dashboard.contactUs.index');
    }


    public function new_slug(){
        $slug = rand(10000000, 99999999);
        $validator = \Validator::make(['slug' => $slug],
            [
                'slug' => 'required|unique:contact_us,slug',
            ]
        );
        if ($validator->fails()){
            return 0;
        }
        return $slug;
    }

    public function store(Request $request){
        $contactUs = new ContactUs();
        $contactUs->slug = $this->new_slug();
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->subject = $request->subject;
        $contactUs->message = $request->message;
        $contactUs->created_at = Carbon::now();
        $contactUs->updated_at = Carbon::now();
        $contactUs->save();
    }

}