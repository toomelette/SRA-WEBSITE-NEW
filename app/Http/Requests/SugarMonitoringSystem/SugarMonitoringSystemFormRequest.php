<?php

namespace App\Http\Requests\SugarMonitoringSystem;

use Illuminate\Foundation\Http\FormRequest;

class SugarMonitoringSystemFormRequest extends FormRequest{

    public function authorize(){
        return true;
    }

    public function rules(){
        $rules = [
        ];
        return $rules;

    }







}
