<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemDepositRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_wbp' => ['required', 'string'],
            'room_block' => ['required', 'string'],
            'case' => ['required', 'string'],
            'relationship' => ['required', 'string'],
            'date_deposit' => ['required', 'date'],
            'problem' => ['required', 'string'],
            'photo_visitor' => ['required', 'image'],
            'family_card' => ['required', 'image'],
            'items' => ['required', 'array'],
            'items.*.name' => ['required', 'string'],
            'items.*.amount' => ['required', 'integer', 'gt:0'],
            'items.*.photo' => ['required', 'image'],
        ];
    }
}
