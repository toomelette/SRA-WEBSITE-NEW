<?php

namespace App\Http\Requests\StationLaGranjaAnn;

use Illuminate\Foundation\Http\FormRequest;

class StationLaGranjaAnnFormRequest extends FormRequest{


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
