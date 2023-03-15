<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApproveDepositRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'photo' => ['required', 'image']
        ];
    }
}
