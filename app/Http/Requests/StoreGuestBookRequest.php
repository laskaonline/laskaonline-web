<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGuestBookRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'      => ['required', 'string'],
            'origin'    => ['required', 'string'],
            'nik'       => ['required', 'string', 'between:16,17'],
            'address'   => ['required', 'string'],
            'email'     => ['required', 'email'],
            'phone'     => ['required', 'string', 'starts_with:0,+62'],
            'necessity' => ['required', 'string'],
            'photo'     => ['required', 'image']
        ];
    }

    public function attributes(): array
    {
        return [
            'name'      => 'Nama',
            'origin'    => 'Asal',
            'nik'       => 'NIK',
            'address'   => 'Alamat',
            'email'     => 'Email',
            'phone'     => 'Nomor telepon',
            'necessity' => 'Keperluan',
            'photo'     => 'Foto',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'email'    => ':attribute tidak valid',
            'between'  => ':attribute harus 16 atau 17 digit',
            'starts_with' => ':attribute harus diawali dengan 0 atau +62',
            'image'    => ':attribute harus berupa gambar',
        ];
    }
}
