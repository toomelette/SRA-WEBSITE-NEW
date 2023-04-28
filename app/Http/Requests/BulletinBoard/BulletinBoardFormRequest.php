<?php

namespace App\Http\Requests\BulletinBoard;

use Illuminate\Foundation\Http\FormRequest;

class BulletinBoardFormRequest extends FormRequest{


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
