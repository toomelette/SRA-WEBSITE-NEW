<?php

namespace App\Http\Requests\StkDirectoryMDDC_MDOS;

use Illuminate\Foundation\Http\FormRequest;

class StkDirectoryMDDC_MDOSFormRequest extends FormRequest{


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
