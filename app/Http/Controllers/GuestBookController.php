<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuestBookRequest;
use App\Models\GuestBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestBookController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole(['admin', 'superior'])) {
            return view('admin.guest_books');
        }

        return view('user.buku-tamu');
    }

    public function create()
    {
    }

    public function store(StoreGuestBookRequest $request)
    {
        auth()->user()->guestBook()->create($request->validated());
        $data = $request->all();

        $img = $request->photo;
        $folderPath = "uploads/";

        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.png';

        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        GuestBook::create($data);

        return back()->with('message', 'Buku Tamu telah diisi', $data);
    }

    public function show(GuestBook $guestBooks)
    {
    }

    public function edit(GuestBook $guestBooks)
    {
    }

    public function update(Request $request, GuestBook $guestBooks)
    {
    }

    public function destroy(GuestBook $guestBooks)
    {
    }
}
