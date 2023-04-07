<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWartelsuspasRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_wbp'          => ['required', 'string'],
            'bin_wbp'           => ['required', 'string'],
            'block_and_room'    => ['required', 'string'],
            'destination_phone' => ['required', 'string', 'starts_with:0'],
            'relationship'      => ['required', 'string'],
            'address'           => ['required', 'string'],
            'information'       => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'required'    => ':Attribute harus diisi.',
            'string'      => ':Attribute harus berupa string.',
            'starts_with' => ':Attribute harus diawali dengan :values.',
        ];
    }

    public function attributes()
    {
        return [
            'name_wbp'          => 'Nama WBP',
            'bin_wbp'           => 'BIN WBP',
            'block_and_room'    => 'Blok kamar',
            'destination_phone' => 'Nomor Telepon Tujuan',
            'relationship'      => 'Hubungan',
            'address'           => 'Alamat',
            'information'       => 'Keterangan',
        ];
    }
}
