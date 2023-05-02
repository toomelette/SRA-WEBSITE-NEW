<?php

namespace App\Http\Requests\StationPampangaAnn;

use Illuminate\Foundation\Http\FormRequest;

class StatioPampangaAnnFilterRequest extends FormRequest{



    public function authorize(){

        return true;
    }




    public function rules(){

        return [

            'q' => 'nullable|string|max:90',
            'd' => 'nullable|date_format:"m/d/Y"',

        ];

    }





}
