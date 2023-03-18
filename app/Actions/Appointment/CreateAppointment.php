<?php

namespace App\Actions\Appointment;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;

class CreateAppointment
{
    public function handle(array $data): Appointment
    {
        $queueNumber = $this->generateQueueNumber(now());

        $appointment = new Appointment($data);
        $appointment->queue = $queueNumber;
        $appointment->creator()->associate(auth()->user());

        //TODO: Handle Upload Picture


        $appointment->save();

        return $appointment;
    }


    protected function generateQueueNumber(Carbon $date): int
    {
        $maxQueueNumber = Appointment::whereDate('date', $date->format('Y-m-d'))->max('queue');
        return $maxQueueNumber + 1;
    }

    protected function uploadImage(UploadedFile $file): string
    {
        //TODO: Handle Upload Picture
        return 'test';
    }
}
