<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users',
                'username' => 'required|string|unique:users',
                'password' => 'required|string|min:6',
            ];
        } else {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email,' . $this->id,
                'username' => 'required|string|unique:users,username,' . $this->id,
                'password' => 'required|string|min:6',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'email.required' => 'Email is required!',
            'email.email' => 'Invalid email format!',
            'email.unique' => 'Email is already taken!',
            'username.required' => 'Username is required!',
            'username.unique' => 'Username is already taken!',
            'password.required' => 'Password is required!',
            'password.min' => 'Password must be at least 6 characters!',
        ];
    }
}
