<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWartelsuspasRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_wbp' => ['required', 'string'],
            'bin_wbp' => ['required', 'string'],
            'block_and_room' => ['required', 'string'],
            'destination_phone' => ['required', 'string', 'starts_with:0'],
            'relationship' => ['required', 'string'],
            'information' => ['required', 'string']
        ];
    }
}
