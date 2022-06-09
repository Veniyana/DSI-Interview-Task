<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users',
            'occupation' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
            ],
        ];

    }

    public function messages()
    {
        return [
            '*.required' => 'This field is required',
            'phone.numeric' => 'This field accepts only numbers',
            'email.email' => 'Enter a valid email address',
            'email.unique' => 'This email is already used',
            'password.min' => 'Password should be at least 8 symbols',
            'password.regex' => 'Password should have at least one small letter, one uppercase letter and a special symbol!',
        ];
    }
}
