<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGuestBookRequest;
use App\Models\GuestBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
    }

    public function public()
    {
        return view('user.buku-tamu');
    }

    public function create()
    {
    }

    public function store(StoreGuestBookRequest $request)
    {
        $name       = $request->name;
        $origin     = $request->origin;
        $nik        = $request->nik;
        $address    = $request->address;
        $email      = $request->email;
        $phone      = $request->phone;
        $necessity  = $request->necessity;
        $photo      = $request->file('photo');
        $create_by  = auth()->id();

        if ($request->hasFile('photo')) {
            $path = Storage::putFile('guest_books', $photo);
        } else {
            $path = '';
        }

        $data = new GuestBook;
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

        // Create Transaction for Guest Book
        $data->transactions()->create();

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

    public function filterByDate(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date   = $request->input('end_date');

        $filteredData = GuestBook::whereBetween('created_at', [
            Carbon::parse($start_date)->startOfDay(),
            Carbon::parse($end_date)->endOfDay(),
        ])->get();

        return view('admin.filter_guest_book', ['data' => $filteredData]);
    }
}
