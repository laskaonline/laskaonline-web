<?php

namespace App\Http\Controllers\API;

use App\Actions\Appointment\CreateAppointment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $limit  = $request->query('limit', 100);
        $page   = $request->query('page', 1);
        $sortBy = $request->string('sortBy', 'DESC');

        $query = auth()->user()->hasAnyRole('admin', 'superior')
            ? Appointment::with('items', 'creator', 'user')
            : Appointment::with('items', 'creator', 'user')->whereBelongsTo(auth()->user());

        $appointments = $query->orderBy('created_at', $sortBy)
            ->paginate(
                $perPage = $limit,
                $columns = ['*'],
                $pageName = 'page'
            )->withQueryString();

        return response()->json([
            'message' => 'success',
            'meta' => $this->resultMeta($appointments, true),
            'data' => $this->resultData($appointments),
        ]);
    }

    public function store(StoreAppointmentRequest $request, CreateAppointment $createAppointment)
    {
        $appointment = $createAppointment->handle($request->validated());

        return response()->json([
            'status' => 'success',
            'data' => $appointment
        ], 201);
    }

    public function show(Appointment $appointment)
    {
        return response()->json([
            'status' => 'success',
            'data' => $appointment->with('items', 'creator', 'user')->find($appointment->id)
        ]);
    }

    public function update(Request $request, Appointment $appointment)
    {
    }

    public function destroy(Appointment $appointment)
    {
    }
}
