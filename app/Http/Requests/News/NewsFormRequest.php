<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsFormRequest extends FormRequest{


    public function authorize(){

        return true;
    
    }

    public function rules(){
        


        $rules = [
            
            'title'=>'required|string|max:180',
            'description'=>'required|string',
        ];

        return $rules;

    }







}
