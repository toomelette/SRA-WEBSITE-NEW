<?php

namespace App\Http\Requests\BlockFarmEstablishedLozunMindanao;

use Illuminate\Foundation\Http\FormRequest;

class BlockFarmEstablishedLozunMindanaoFormRequest extends FormRequest{


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
