<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'              => ['required', 'string'],
            'no_ktp'            => ['required', 'string', 'numeric', 'between:16,17'],
            'phone'             => ['required', 'starts_with:0,+62'],
            'email'             => ['required', 'email', 'max:254'],
            'gender'            => ['nullable'],
            'address'           => ['nullable'],
            'job_title'         => ['nullable'],
            'remember_token'    => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
