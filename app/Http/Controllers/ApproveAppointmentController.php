<?php

namespace App\Http\Controllers;

use App\Models\Appointment;

class ApproveAppointmentController extends Controller
{
    public function __invoke(Appointment $appointment)
    {
        $appointment->state = '1';
        $appointment->save();

        return redirect()->route('admin.appointment.index');
    }
}
