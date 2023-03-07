<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuestBookRequest;
use App\Models\GuestBook;
use Illuminate\Http\Request;

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

        return back()->with('message', 'Buku Tamu telah diisi');
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
