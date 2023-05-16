<?php

namespace App\Http\Requests\StkDirectoryMillsAssociationPlantersFed;

use Illuminate\Foundation\Http\FormRequest;

class StkDirectoryMillsAssociationPlantersFedFormRequest extends FormRequest{


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
