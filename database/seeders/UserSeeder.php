<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $visitors = User::factory(3)->state(new Sequence(
            ['email' => 'visitor1@test.com'],
            ['email' => 'visitor2@test.com'],
            ['email' => 'visitor3@test.com']
        ))->create();

        $visitors->each(function ($visitor) {
            $visitor->assignRole('visitor');
        });
    }
}
