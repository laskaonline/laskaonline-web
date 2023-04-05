<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Appointment;

class ApproveAppointmentController extends Controller
{
    public function __invoke(Appointment $appointment)
    {
        $appointment->state = '1';
        $appointment->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Kunjungan berhasil disetujui'
        ], 200);
    }
}
