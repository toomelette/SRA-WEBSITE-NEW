<?php

namespace App\Http\Requests\SugarcaneVarieties;

use Illuminate\Foundation\Http\FormRequest;

class SugarcaneVarietiesFormRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
        ];
        return $rules;

    }







}
