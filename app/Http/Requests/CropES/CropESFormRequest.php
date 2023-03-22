<?php

namespace App\Http\Requests\CropES;

use Illuminate\Foundation\Http\FormRequest;

class CropESFormRequest extends FormRequest{


    public function authorize(){

        return true;

    }

    public function rules(){



        $rules = [
            'crop_year'=>'required|string|max:45',

        ];

        return $rules;

    }







}
