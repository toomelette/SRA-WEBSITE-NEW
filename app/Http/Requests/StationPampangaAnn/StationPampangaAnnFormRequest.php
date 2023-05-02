<?php

namespace App\Http\Requests\StationPampangaAnn;

use Illuminate\Foundation\Http\FormRequest;

class StationPampangaAnnFormRequest extends FormRequest{


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
