<?php

namespace App\Http\Requests\StkSugarTradersInter;

use Illuminate\Foundation\Http\FormRequest;

class StkSugarTradersInterFormRequest extends FormRequest{


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
