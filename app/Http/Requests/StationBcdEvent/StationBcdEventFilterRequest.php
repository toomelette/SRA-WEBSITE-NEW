<?php

namespace App\Http\Requests\StationBcdEvent;

use Illuminate\Foundation\Http\FormRequest;

class StationBcdEventFilterRequest extends FormRequest{



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
