<?php

namespace App\Http\Requests\StkSugarTradersDom;

use Illuminate\Foundation\Http\FormRequest;

class StkSugarTradersDomFormRequest extends FormRequest{


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
