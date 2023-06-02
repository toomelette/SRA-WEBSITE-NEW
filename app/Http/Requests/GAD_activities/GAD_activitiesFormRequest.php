<?php

namespace App\Http\Requests\GAD_activities;

use Illuminate\Foundation\Http\FormRequest;

class GAD_activitiesFormRequest extends FormRequest{


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
