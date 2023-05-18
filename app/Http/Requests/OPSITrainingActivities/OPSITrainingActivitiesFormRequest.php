<?php

namespace App\Http\Requests\OPSITrainingActivities;

use Illuminate\Foundation\Http\FormRequest;

class OPSITrainingActivitiesFormRequest extends FormRequest{


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
