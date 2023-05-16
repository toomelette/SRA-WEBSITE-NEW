<?php

namespace App\Http\Requests\StkDirectoryBioethanolProducers;

use Illuminate\Foundation\Http\FormRequest;

class StkDirectoryBioethanolProducersFormRequest extends FormRequest{


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
