<?php

namespace App\Http\Requests\StkDirectorySugarRefineries;

use Illuminate\Foundation\Http\FormRequest;

class StkDirectorySugarRefineriesFormRequest extends FormRequest{


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
