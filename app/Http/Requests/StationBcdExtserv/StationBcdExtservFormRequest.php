<?php

namespace App\Http\Requests\StationBcdExtserv;

use Illuminate\Foundation\Http\FormRequest;

class StationBcdExtservFormRequest extends FormRequest{


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
