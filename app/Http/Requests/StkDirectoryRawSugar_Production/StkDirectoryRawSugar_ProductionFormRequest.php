<?php

namespace App\Http\Requests\StkDirectoryRawSugar_Production;

use Illuminate\Foundation\Http\FormRequest;

class StkDirectoryRawSugar_ProductionFormRequest extends FormRequest{


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
