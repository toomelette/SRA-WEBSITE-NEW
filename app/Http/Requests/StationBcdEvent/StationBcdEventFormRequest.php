<?php

namespace App\Http\Requests\StationBcdEvent;

use Illuminate\Foundation\Http\FormRequest;

class StationBcdEventFormRequest extends FormRequest{


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
