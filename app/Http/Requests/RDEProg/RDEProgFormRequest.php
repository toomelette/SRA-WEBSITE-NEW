<?php

namespace App\Http\Requests\RDEProg;

use Illuminate\Foundation\Http\FormRequest;

class RDEProgFormRequest extends FormRequest{


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
