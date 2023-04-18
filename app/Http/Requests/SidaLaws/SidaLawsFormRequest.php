<?php

namespace App\Http\Requests\SidaLaws;

use Illuminate\Foundation\Http\FormRequest;

class SidaLawsFormRequest extends FormRequest{


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
