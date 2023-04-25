<?php

namespace App\Http\Requests\BlockFarmInfrasFMR;

use Illuminate\Foundation\Http\FormRequest;

class BlockFarmInfrasFMRFilterRequest extends FormRequest{



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
