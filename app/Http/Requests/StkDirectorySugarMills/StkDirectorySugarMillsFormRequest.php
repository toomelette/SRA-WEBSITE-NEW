<?php

namespace App\Http\Requests\StkDirectorySugarMills;

use Illuminate\Foundation\Http\FormRequest;

class StkDirectorySugarMillsFormRequest extends FormRequest{


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
