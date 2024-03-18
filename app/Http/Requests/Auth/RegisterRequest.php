<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string', 'min:1', 'max:255'],
            'lastname' => ['required', 'string', 'min:1', 'max:255'],
            'middlename' => ['required', 'string', 'min:1', 'max:255'],
            'gender' => ['required'],
            'civil_status' => ['required'],
            'religion' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ];
    }
}
