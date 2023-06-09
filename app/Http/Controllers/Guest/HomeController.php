<?php


namespace App\Http\Controllers\Guest;


use App\Http\Controllers\Controller;
use App\Models\Visitors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    public function index(Request $request){
        $value = $request->cookie('visitorCounter');
        if (empty($value)){
            $ip  =\Illuminate\Support\Facades\Request::ip();
            $data = \Stevebauman\Location\Facades\Location::get($ip);
            $visitors = Visitors::query()
                ->where('countryName','=',$data->countryName ?? 'Unknown')
                ->where('countryCode','=', $data->countryCode ?? 'Unknown')
                ->where('regionCode','=', $data->regionCode ?? 'Unknown')
                ->where('regionName','=', $data->regionName ?? 'Unknown')
                ->where('cityName','=', $data->cityName ?? 'Unknown')
                ->first();

            if(empty($visitors)){
                $v = new Visitors;
                $v->countryName = $data->countryName ?? 'Unknown';
                $v->countryCode = $data->countryCode ?? 'Unknown';
                $v->regionCode = $data->regionCode ?? 'Unknown';
                $v->regionName = $data->regionName ?? 'Unknown';
                $v->cityName = $data->cityName ?? 'Unknown';
                $v->visitors = 1;
                $v->save();
            }else{
                $visitors->visitors = $visitors->visitors + 1;
                $visitors->update();
            }


            $minutes = 60;
            \Cookie::queue(\Cookie::make('visitorCounter',Str::random(10),$minutes));
        }

        return view('layouts.guest-master');
    }

    public function viewFile($tableName, $slug){

        $data = DB::table($tableName)->where('slug','=',$slug)->first();
        if(!Storage::disk('local')->exists($data->path)) {
            abort(502,'File not found');
        }
        return Storage::disk('local')->response($data->path);
    }
}