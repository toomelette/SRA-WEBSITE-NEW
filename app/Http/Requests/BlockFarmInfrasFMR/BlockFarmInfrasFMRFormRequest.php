<?php

namespace App\Http\Requests\BlockFarmInfrasFMR;

use Illuminate\Foundation\Http\FormRequest;

class BlockFarmInfrasFMRFormRequest extends FormRequest{


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
