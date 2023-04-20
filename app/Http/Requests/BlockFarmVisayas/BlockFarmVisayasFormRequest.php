<?php

namespace App\Http\Requests\BlockFarmVisayas;

use Illuminate\Foundation\Http\FormRequest;

class BlockFarmVisayasFormRequest extends FormRequest{


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
