<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GuestBook;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
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
