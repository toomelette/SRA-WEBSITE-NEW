<?php

namespace App\Http\Requests\StationPampangaEvent;

use Illuminate\Foundation\Http\FormRequest;

class StationPampangaEventFormRequest extends FormRequest{


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
