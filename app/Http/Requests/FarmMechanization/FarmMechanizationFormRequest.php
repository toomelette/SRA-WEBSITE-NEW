<?php

namespace App\Http\Requests\FarmMechanization;

use Illuminate\Foundation\Http\FormRequest;

class FarmMechanizationFormRequest extends FormRequest{


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
