<?php

namespace App\Http\Requests\BlockFarmEstablishedLozunMindanao;

use Illuminate\Foundation\Http\FormRequest;

class BlockFarmEstablishedLozunMindanaoFilterRequest extends FormRequest{



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
