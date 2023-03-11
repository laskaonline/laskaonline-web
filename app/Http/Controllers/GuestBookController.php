<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuestBookRequest;
use App\Models\GuestBook;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request)
    {
        $id         = $request->id;
        $name       = $request->name;
        $origin     = $request->origin;
        $nik        = $request->nik;
        $address    = $request->address;
        $email      = $request->email;
        $phone      = $request->phone;
        $necessity  = $request->necessity;
        $photo      = $request->photo;
        $create_by   = Auth()->user()->id;


        $request->validate([
            'name'      => 'required|string',
            'origin'    => 'required|string',
            'nik'       => 'required|integer',
            'address'   => 'required|string',
            'email'     => 'required|email',
            'phone'     => 'required|string|starts_with:0,+62',
            'necessity' => 'required|string',
            'photo'     => 'mimes:jpg,png,jpeg|image',
        ]);

        if ($request->hasFile('photo')) {
            // $path = $request->file('photo')->store('guest_books');
            $path = Storage::putFile('guest_books', $request->file('photo'));
        } else {
            $path = '';
        }

        $data = new GuestBook;
        $data->id           = $id;
        $data->name         = $name;
        $data->origin       = $origin;
        $data->nik          = $nik;
        $data->address      = $address;
        $data->email        = $email;
        $data->phone        = $phone;
        $data->necessity    = $necessity;
        $data->photo        = $path;
        $data->created_by   = $create_by;

        $data->save();

        return back()->with('success', 'Buku Tamu telah diisi');
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
