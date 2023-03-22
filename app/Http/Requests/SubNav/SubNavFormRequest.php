<?php

namespace App\Http\Requests\SubNav;

use Illuminate\Foundation\Http\FormRequest;

class SubNavFormRequest extends FormRequest{


    public function authorize(){

        return true;
    }




    public function rules(){

        return [

            'nav_main_slug' => 'required|string|max:45',
            'name' => 'required|string|max:45',
            'is_active' => 'required|int|max:3',
        ];

    }





}
