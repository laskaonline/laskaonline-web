<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKunjunganRequest;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function index()
    {
        return view('user.kunjungan');
    }

    public function view()
    {

    }

    public function create()
    {
        return view('user.registrasi-kunjungan');
    }

    public function store(StoreKunjunganRequest $request)
    {

    }

    public function edit(Appointment $kunjungan)
    {

    }

    public function update(Appointment $kunjungan)
    {

    }

    public function destroy(Appointment $kunjungan)
    {

    }
}
