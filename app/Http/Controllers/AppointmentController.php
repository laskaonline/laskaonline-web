<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            $data = [
                'dataAppointment'   => Appointment::all()
            ];
            return view('admin.queue_number', $data);
        } else {
            $data = [
                'dataAppointment'   => Appointment::where('created_by', Auth::id())->get()
            ];
            return view('user.kunjungan', $data);
        }
    }

    public function view(Appointment $appointment)
    {
        return view('user.detail-kunjungan', compact('appointment'));
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

    public function show(Appointment $appointment)
    {
        return view('user.detail-kunjungan', compact('appointment'));
    }

    public function destroy(Appointment $kunjungan)
    {
    }
}
