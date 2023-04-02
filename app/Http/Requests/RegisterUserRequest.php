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
            'no_ktp' => ['required', 'string', 'between:16,17'],
            'email' => ['required', 'email', 'unique:users,email'],
            'phone' => ['required', 'starts_with:08,+62'],
            // 'password' => ['required', 'confirmed', Password::min(8)->uncompromised(3)],
            'password' => ['required', 'confirmed', Password::min(8)],
            'password_confirmation' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'required'    => ':Attribute harus diisi.',
            'string'      => ':Attribute harus berupa string.',
            'email'       => ':Attribute harus alamat email yang valid.',
            'unique'      => ':Attribute sudah terdaftar.',
            'starts_with' => ':Attribute harus diawali dengan :values.',
            'between'     => ':Attribute harus berjumlah :min sampai :max karakter.',
            'confirmed'   => ':Attribute tidak cocok dengan konfirmasi :attribute.',
            'min'         => ':Attribute harus berjumlah minimal :min karakter.',
        ];
    }
}
