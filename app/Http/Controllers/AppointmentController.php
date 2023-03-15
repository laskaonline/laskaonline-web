<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('user.kunjungan');
    }

    public function view(Appointment $appointment)
    {
        return view('user.detail-kunjungan' , compact('appointment'));
    }

    public function create()
    {
        return view('user.registrasi-kunjungan');
    }

    public function store(StoreAppointmentRequest $request)
    {
        //TODO: Handle Upload Picture
        $appointment = auth()->user()->appointments()->create($request->validated());

        return response()->json([
            'status' => 'success',
            'data' => $appointment
        ], 201);
    }

    public function edit(Appointment $kunjungan)
    {
    }

    public function update(Appointment $kunjungan)
    {
    }

    public function show($id)
    {
        return view('user.detail-kunjungan');
    }

    public function destroy(Appointment $kunjungan)
    {
    }
}
