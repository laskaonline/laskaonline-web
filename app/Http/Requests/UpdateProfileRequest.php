<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'no_ktp' => ['numeric'],
            'phone' => ['starts_with:08,+62'],
            'email' => ['email'],
            'job_title' => ['sometimes','string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }
}
