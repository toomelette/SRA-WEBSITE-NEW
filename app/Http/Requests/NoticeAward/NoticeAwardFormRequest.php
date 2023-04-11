<?php

namespace App\Http\Requests\NoticeAward;

use Illuminate\Foundation\Http\FormRequest;

class NoticeAwardFormRequest extends FormRequest{


    public function authorize(){

        return true;

    }

    public function rules(){



        $rules = [
            'crop_year'=>'required|string|max:45',

        ];

        return $rules;

    }







}
