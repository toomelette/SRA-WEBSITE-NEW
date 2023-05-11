<?php

namespace App\Http\Requests\StkMolassesTradersInterDom;

use Illuminate\Foundation\Http\FormRequest;

class StkMolassesTradersInterDomFormRequest extends FormRequest{


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
