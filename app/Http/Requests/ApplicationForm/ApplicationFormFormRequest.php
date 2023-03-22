<?php

namespace App\Http\Requests\ApplicationForm;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationFormFormRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
        ];
        return $rules;

    }







}
