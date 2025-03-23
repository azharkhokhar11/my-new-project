<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:users,email',
            'password' => 'required|string|min:5|confirmed',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please provide your name.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name cannot be longer than 50 characters.',

            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email address cannot be longer than 50 characters.',
            'email.unique' => 'Email already exists. Please use a different email.',

            'password.required' => 'Please provide a password.',
            'password.min' => 'The password must be at least 5 characters long.',
            'password.confirmed' => 'The confirmation password does not match.',

            'password_confirmation.required' => 'Please confirm your password.',
        ];
    }
}
