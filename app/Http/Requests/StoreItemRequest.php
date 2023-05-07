<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'depositable_id'    => ['required', 'integer'],
            'depositable_type'  => ['required', 'string', 'in:App\Models\ItemDeposit,App\Models\Appointment'],
            'name'              => ['required', 'string'],
            'amount'            => ['required', 'integer', 'gt:0'],
            'photo'             => ['required', 'image'],
        ];
    }
}
