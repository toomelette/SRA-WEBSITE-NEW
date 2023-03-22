<?php

namespace App\Http\Requests\MemorandumCircular;

use Illuminate\Foundation\Http\FormRequest;

class MemorandumCircularFormRequest extends FormRequest{


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
