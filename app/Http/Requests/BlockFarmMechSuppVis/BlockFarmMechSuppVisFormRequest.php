<?php

namespace App\Http\Requests\BlockFarmMechSuppVis;

use Illuminate\Foundation\Http\FormRequest;

class BlockFarmMechSuppVisFormRequest extends FormRequest{


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
