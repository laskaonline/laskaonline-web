<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemDepositRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name_wbp'          => ['required', 'string'],
            'room_block'        => ['required', 'string'],
            'case'              => ['required', 'string'],
            'relationship'      => ['required', 'string'],
            'deposit_date'      => ['required', 'date'],
            'problem'           => ['required', 'string'],
            'photo_visitor'     => ['required', 'image'],
            'family_card'       => ['required', 'image'],
            // 'items'             => ['required', 'array'],
            // 'items.*.name'      => ['required', 'string'],
            // 'items.*.amount'    => ['required', 'integer', 'gt:0'],
            // 'items.*.photo'     => ['required', 'image'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'image' => ':attribute harus berupa gambar',
            'date' => ':attribute harus berupa tanggal',
            'string' => ':attribute harus berupa string',
        ];
    }

    public function attributes(): array
    {
        return [
            'name_wbp'          => 'Nama WBP',
            'room_block'        => 'Blok Kamar',
            'case'              => 'Kasus',
            'relationship'      => 'Hubungan',
            'deposit_date'      => 'Tanggal Penitipan',
            'problem'           => 'Perkara',
            'photo_visitor'     => 'Foto Selfie + KTP Penitip',
            'family_card'       => 'Upload Kartu Keluarga',
        ];
    }
}
