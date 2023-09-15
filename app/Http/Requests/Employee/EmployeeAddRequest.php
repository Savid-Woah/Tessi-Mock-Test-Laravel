<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeAddRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:80',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'position'=> 'required|string|max:255',
            'salary'=> 'required|number',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'The name field is required.',
            'name.string' => 'The name field must be a text.',
            'name.max' => 'The name field cannot exceed 255 characters.',

            'email.required' => 'The email field is required.',
            'email.string' => 'The email field must be a text.',
            'email.email' => 'The email field must be an email.',
            'email.max' => 'The email field cannot exceed 80 characters.',

            'phone.required' => 'The phone field is required.',
            'phone.string' => 'The phone field must be a text.',
            'phone.max' => 'The phone field cannot exceed 255 characters.',

            'address.required' => 'The address field is required.',
            'address.string' => 'The address field must be a text.',
            'address.max' => 'The address field cannot exceed 255 characters.',

            'position.required' => 'The position field is required.',
            'position.string' => 'The position field must be a text.',
            'position.max' => 'The position field cannot exceed 255 characters.',

            'salary.required' => 'The salary field is required.',
            'salary.number' => 'The salary field must be a number.'
        ];
    }
}
