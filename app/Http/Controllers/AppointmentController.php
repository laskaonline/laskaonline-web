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
                'dataAppointment' => Appointment::with('user')->orderBy('created_at', 'desc')->get()
            ];
            return view('admin.queue_number', $data);
        } else {
            $data = [
                'dataAppointment' => Appointment::with('user')->where('created_by', Auth::id())->orderBy('created_at', 'desc')->get()
            ];
            return view('user.kunjungan', $data);
        }
    }

    public function view(Appointment $appointment)
    {
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            return view('admin.detail_queue_number', compact('appointment'));
        }
        return view('user.detail-kunjungan', compact('appointment'));
    }

    public function create()
    {
        return view('user.registrasi-kunjungan');
    }


    public function store(StoreAppointmentRequest $request, CreateAppointment $createAppointment)
    {
        $appointment = $createAppointment->handle($request->validated());

        return redirect()->route('appointment.show', ['appointment' => $appointment])->with(
            'success',
            'Kunjungan berhasil didaftarkan'
        );
    }

    public function edit(Appointment $kunjungan)
    {
    }

    public function update(Appointment $kunjungan)
    {
    }

    public function show(Appointment $appointment)
    {
        if (auth()->user()->hasAnyRole(['admin', 'superior'])) {
            return view('admin.detail_queue_number', compact('appointment'));
        }
        return view('user.detail-kunjungan', compact('appointment'));
    }

    public function destroy(Appointment $kunjungan)
    {
    }
}
