<?php

namespace App\Http\Requests\StationPampangaExtserv;

use Illuminate\Foundation\Http\FormRequest;

class StationPampangaExtservFormRequest extends FormRequest{


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
