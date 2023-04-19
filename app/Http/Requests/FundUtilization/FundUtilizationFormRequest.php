<?php

namespace App\Http\Requests\FundUtilization;

use Illuminate\Foundation\Http\FormRequest;

class FundUtilizationFormRequest extends FormRequest{


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
