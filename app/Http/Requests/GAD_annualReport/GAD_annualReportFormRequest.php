<?php

namespace App\Http\Requests\GAD_annualReport;

use Illuminate\Foundation\Http\FormRequest;

class GAD_annualReportFormRequest extends FormRequest{


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
