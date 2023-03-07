<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestBookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'origin' => ['required', 'string'],
            'nik' => ['required', 'string', 'between:16,17'],
            'address' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string', 'starts_with:0,+62'],
            'necessity' => ['required', 'string'],
            'photo' => ['required', 'image']
        ];
    }
}
