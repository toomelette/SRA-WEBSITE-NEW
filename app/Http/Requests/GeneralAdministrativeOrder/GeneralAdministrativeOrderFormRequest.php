<?php

namespace App\Http\Requests\GeneralAdministrativeOrder;

use Illuminate\Foundation\Http\FormRequest;

class GeneralAdministrativeOrderFormRequest extends FormRequest{


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
