<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email',
            'username'=>'required',
            'password'=>'required',
            'img'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'firstName.required'=>'first name is required',
            'lastName.required'=>'last name is required',
            'email.required'=>'email is required',
            'email.email'=>'email is invalid',
            'username.required'=>'user is required',
            'password.required'=>'password is required',
            'img.required'=>'image is required'
        ];
    }
}
