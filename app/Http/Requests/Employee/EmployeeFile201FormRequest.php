<?php


namespace App\Http\Requests\Employee;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeFile201FormRequest extends FormRequest
{
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'employee' => [
                'required',
                'string',
                'max:255',
                Rule::exists('hr_employees','slug'),
            ],
        ];
    }
}