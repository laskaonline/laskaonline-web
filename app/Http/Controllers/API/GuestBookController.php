<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGuestBookRequest;
use App\Models\GuestBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestBookController extends Controller
{
    public function index()
    {
        return response()->json(
            [
                'data' => GuestBook::all(),
                'message' => 'success'
            ]
        );
    }

    public function store(StoreGuestBookRequest $request)
    {
        $name = $request->name;
        $origin = $request->origin;
        $nik = $request->nik;
        $address = $request->address;
        $email = $request->email;
        $phone = $request->phone;
        $necessity = $request->necessity;
        $photo = $request->file('photo');
        $create_by = auth()->id();

        if ($request->hasFile('photo')) {
            $path = Storage::putFile('guest_books', $photo);
        } else {
            $path = '';
        }

        $data = new GuestBook;
        $data->name = $name;
        $data->origin = $origin;
        $data->nik = $nik;
        $data->address = $address;
        $data->email = $email;
        $data->phone = $phone;
        $data->necessity = $necessity;
        $data->photo = $path;
        $data->created_by = $create_by;

        $data->save();

        return response()->json([
            'data' => $data,
            'message' => 'Buku Tamu berhasil diisi'
        ], 201);

    }

    public function show(GuestBook $guestBook)
    {
    }

    public function update(Request $request, GuestBook $guestBook)
    {
    }

    public function destroy(GuestBook $guestBook)
    {
    }
}
