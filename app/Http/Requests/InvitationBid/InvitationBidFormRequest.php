<?php

namespace App\Http\Requests\InvitationBid;

use Illuminate\Foundation\Http\FormRequest;

class InvitationBidFormRequest extends FormRequest{


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
