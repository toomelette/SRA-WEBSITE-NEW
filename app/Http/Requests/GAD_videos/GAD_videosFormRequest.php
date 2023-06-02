<?php

namespace App\Http\Requests\GAD_videos;

use Illuminate\Foundation\Http\FormRequest;

class GAD_videosFormRequest extends FormRequest{


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
