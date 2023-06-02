<?php

namespace App\Http\Controllers;


use App\Models\Applicant;
use App\Models\Article;
use App\Models\Course;
use App\Models\Document;
use App\Models\DocumentDisseminationLog;
use App\Models\EmailContact;
use App\Models\Employee;
use App\Models\LeaveApplication;
use App\Models\PermissionSlip;
use App\Models\Visitors;
use App\Swep\Services\HomeService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class HomeController extends Controller{
    



	protected $home;




    public function __construct(HomeService $home){

        $this->home = $home;

    }


    public function index(Request $request){
        return view('dashboard.home.index');

    }

    public function setCookie(){
        $minutes = 1;
        $response = new Response('Set Cookie');
        $response ->withCookie(cookie('visitorCounter', Str::random(10), $minutes));
        return $response;
    }

    public  function getCookie( Request $request){
        $value = $request->cookie('visitorCounter');
        return $value;
        if (empty($value)){
            return 'SET COOKIES!';
        }
        return 1;
    }
}
