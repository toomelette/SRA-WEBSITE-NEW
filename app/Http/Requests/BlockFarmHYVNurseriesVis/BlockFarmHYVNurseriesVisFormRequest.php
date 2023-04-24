<?php

namespace App\Http\Requests\BlockFarmHYVNurseriesVis;

use Illuminate\Foundation\Http\FormRequest;

class BlockFarmHYVNurseriesVisFormRequest extends FormRequest{


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
