<?php

namespace App\Http\Requests\BlockFarmEstablishedVisayas;

use Illuminate\Foundation\Http\FormRequest;

class BlockFarmEstablishedVisayasFormRequest extends FormRequest{


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
