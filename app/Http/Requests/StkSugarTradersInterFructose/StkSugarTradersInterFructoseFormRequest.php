<?php

namespace App\Http\Requests\StkSugarTradersInterFructose;

use Illuminate\Foundation\Http\FormRequest;

class StkSugarTradersInterFructoseFormRequest extends FormRequest{


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
