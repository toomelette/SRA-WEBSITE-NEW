<?php

namespace App\Http\Requests\Navigation;

use Illuminate\Foundation\Http\FormRequest;

class NavigationFormRequest extends FormRequest{


    public function authorize(){

        return true;
    
    }

    public function rules(){
        
        $rows = $this->request->get('row');

        $rules = [
            
            'name'=>'required|string|max:45',
            'is_main' => 'required|int|max:3',
            'is_active' => 'required|int|max:3',
        ];


        if(!empty($rows)){

            foreach($rows as $key => $value){
                    
                $rules['row.'.$key.'.sub_name'] = 'required|string|max:45';
                $rules['row.'.$key.'.sub_is_active'] = 'required|int|max:3';

            } 

        }

        return $rules;

    }







}
