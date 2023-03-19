<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_wbp' => ['required', 'string', 'max:255'],
            'case' => ['required', 'string', 'max:255'],
            'relationship' => ['required', 'string', 'max:255'],
            'visit_date' => ['required', 'date'],
            'problem' => ['required', 'string', 'max:255'],
            'photo_visitor' => ['required', 'image'],
            'family_card' => ['required', 'image'],
            'male_followers' => ['required', 'integer', 'gte:0'],
            'female_followers' => ['required', 'integer', 'gte:0'],
            'child_followers' => ['required', 'integer', 'gte:0'],
            'items' => ['nullable', 'array'],
            'items.*.name' => ['required', 'string'],
            'items.*.amount' => ['required', 'integer', 'gt:0'],
            'items.*.photo' => ['required', 'image'],
        ];
    }
}
