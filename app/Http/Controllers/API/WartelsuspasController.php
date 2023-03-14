<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Wartelsuspas;
use Illuminate\Http\Request;

class WartelsuspasController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Wartelsuspas::all(),
            'message' => 'success'
        ]);
    }

    public function store(Request $request)
    {
    }

    public function show(Wartelsuspas $wartelsuspas)
    {
    }

    public function update(Request $request, Wartelsuspas $wartelsuspas)
    {
    }

    public function destroy(Wartelsuspas $wartelsuspas)
    {
    }
}
