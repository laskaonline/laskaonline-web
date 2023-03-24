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
            $data = [
                'dataGuestBook'   => GuestBook::orderBy('created_at', 'desc')->get()
            ];
            return view('admin.guest_books', $data);
        }

        return view('user.buku-tamu');
    }

    public function create()
    {
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

        return back()->with('success', 'Buku Tamu telah diisi');
    }

    public function show(GuestBook $guest_book)
    {
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            return view('admin.detail_guest_book', compact('guest_book'));
        }
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
