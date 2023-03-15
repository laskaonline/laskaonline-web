<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasAnyRole('admin', 'superior')) {
            $appointments = Appointment::with('user')->get();
            return response()->json($appointments);
        }

        $appointments = auth()->user()->appointments()->get();
        return response()->json([
            'status' => 'success',
            'data' => $appointments
        ]);
    }

    public function store(StoreAppointmentRequest $request)
    {
        $appointment = auth()->user()->appointments()->create($request->validated());

        return response()->json([
            'status' => 'success',
            'data' => $appointment
        ], 201);
    }

    public function show(Appointment $appointment)
    {
        return response()->json([
            'status' => 'success',
            'data' => $appointment
        ]);
    }

    public function update(Request $request, Appointment $appointment)
    {
    }

    public function destroy(Appointment $appointment)
    {
    }
}
