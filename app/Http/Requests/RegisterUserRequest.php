<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'nik' => ['required', 'string', 'between:16,17'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'starts_with:08,+62'],
            'password' => ['required', 'confirmed', Password::min(8)->uncompromised(3)],
        ];
    }
}
