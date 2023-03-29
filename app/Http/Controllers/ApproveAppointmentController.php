<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ApproveAppointmentController extends Controller
{
    public function __invoke(Appointment $appointment)
    {
        $appointment->state = '1';
        $appointment->approve_by = auth()->user()->id;
        $appointment->approve_date = Carbon::now();
        $appointment->save();

        return redirect()->route('admin.appointment.index');
    }
}
