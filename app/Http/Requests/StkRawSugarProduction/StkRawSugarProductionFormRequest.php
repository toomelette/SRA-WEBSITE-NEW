<?php

namespace App\Http\Requests\StkRawSugarProduction;

use Illuminate\Foundation\Http\FormRequest;

class StkRawSugarProductionFormRequest extends FormRequest{


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
