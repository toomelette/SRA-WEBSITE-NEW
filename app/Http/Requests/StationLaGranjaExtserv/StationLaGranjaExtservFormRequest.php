<?php

namespace App\Http\Requests\StationLaGranjaExtserv;

use Illuminate\Foundation\Http\FormRequest;

class StationLaGranjaExtservFormRequest extends FormRequest{


    public function authorize(){

        return true;

    }

    public function rules(){



        $rules = [
            'year'=>'required|string|max:45',

        ];

        return $rules;

    }







}
