<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitizensCharterController extends Controller{

    public function citizensCharter(){
        return view('landingPage.citizensCharter.citizensCharter');
    }


    }