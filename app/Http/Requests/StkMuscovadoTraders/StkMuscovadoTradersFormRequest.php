<?php

namespace App\Http\Requests\StkMuscovadoTraders;

use Illuminate\Foundation\Http\FormRequest;

class StkMuscovadoTradersFormRequest extends FormRequest{


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
