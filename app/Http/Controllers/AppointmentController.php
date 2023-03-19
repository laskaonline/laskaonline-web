<?php

namespace App\Http\Controllers;

use App\Actions\Appointment\CreateAppointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            $data = [
                'dataAppointment' => Appointment::all()->sortByDesc('created_at')
            ];
            return view('admin.queue_number', $data);
        } else {
            $data = [
                'dataAppointment' => Appointment::where('created_by', Auth::id())->orderBy('created_at', 'desc')->get()
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


    public function store(StoreAppointmentRequest $request, CreateAppointment $createAppointment)
    {
        $createAppointment->handle($request->validated());

        return back()->with([
            'Success' => 'Kunjungan berhasil didaftarkan',
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
