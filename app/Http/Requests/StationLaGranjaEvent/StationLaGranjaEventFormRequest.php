<?php

namespace App\Http\Requests\StationLaGranjaEvent;

use Illuminate\Foundation\Http\FormRequest;

class StationLaGranjaEventFormRequest extends FormRequest{


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
