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
        $appointment = new Appointment();
        $appointment->name_wbp = $data['name_wbp'];
        $appointment->room_block = $data['room_block'];
        $appointment->case = $data['case'];
        $appointment->relationship = $data['relationship'];
        $appointment->problem = $data['problem'];
        $appointment->visit_date = $data['visit_date'];
        $appointment->male_followers = $data['male_followers'];
        $appointment->female_followers = $data['female_followers'];
        $appointment->child_followers = $data['child_followers'];
        $appointment->queue = $this->generateQueueNumber(Carbon::parse($data['visit_date']));
        $appointment->photo_visitor = $this->uploadImage('photo_visitor', $data['photo_visitor']);
        $appointment->family_card = $this->uploadImage('family_card', $data['family_card']);

        $appointment->creator()->associate(auth()->user());

        $appointment->save();

        if ($data['items'] ?? null) {
            return $appointment;
        } else {
            $this->createItems($data['items'], $appointment);
            return $appointment;
        }
    }


    protected function generateQueueNumber(Carbon $date): int
    {
        $maxQueueNumber = Appointment::whereDate('visit_date', $date->format('Y-m-d'))->max('queue');
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

    /**
     * @param $items1
     * @param  Appointment  $appointment
     * @return void
     */
    public function createItems($items1, Appointment $appointment): void
    {
        $items = collect($items1)->map(function ($item) {
            return $this->mapItem($item);
        });

        $appointment->items()->createMany($items);
    }
}
