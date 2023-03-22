<?php

namespace App\Http\Requests\OfficeCircular;

use Illuminate\Foundation\Http\FormRequest;

class OfficeCircularFormRequest extends FormRequest{


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
