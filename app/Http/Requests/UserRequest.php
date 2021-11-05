<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|confirmed'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Set your name',
            'name.unique' => 'This Name is exist',
            'email.required' => 'Set your email',
            'email.unique' => 'This email is exist',
            'password.required' => 'Set your password',
            'password.confirmed' => 'Reppead your password'

        ];
    }
}
