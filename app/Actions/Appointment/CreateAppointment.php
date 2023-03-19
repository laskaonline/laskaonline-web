<?php

namespace App\Actions\Appointment;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateAppointment
{
    public function handle(array $data): Appointment
    {
        $appointment = new Appointment($data);

        $queueNumber = $this->generateQueueNumber(Carbon::parse($data['visit_date']));
        $appointment->queue = $queueNumber;

        $appointment->photo_visitor = $this->uploadImage('photo_visitor', $data['photo_visitor']);
        $appointment->family_card = $this->uploadImage('family_card', $data['family_card']);

        $appointment->creator()->associate(auth()->user());

        $appointment->save();

        $items = collect($data['items'])->map(function ($item) {
            return $this->mapItem($item);
        });

        $appointment->items()->createMany($items);

        return $appointment;
    }


    protected function generateQueueNumber(Carbon $date): int
    {
        $maxQueueNumber = Appointment::whereDate('date', $date->format('Y-m-d'))->max('queue');
        return $maxQueueNumber + 1;
    }

    private function uploadImage(string $path, UploadedFile $file): string
    {
        return Storage::putFile($path, $file);
    }

    /**
     * @param  array  $item
     * @return array
     */
    private function mapItem(array $item): array
    {
        $photo_path = $this->uploadImage('item-deposit', $item['photo']);

        return [
            'name' => $item['name'],
            'amount' => $item['amount'],
            'photo' => $photo_path,
        ];
    }
}
