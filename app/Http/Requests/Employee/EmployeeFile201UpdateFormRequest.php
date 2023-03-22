<?php


namespace App\Http\Requests\Employee;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeFile201UpdateFormRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ];
    }
}