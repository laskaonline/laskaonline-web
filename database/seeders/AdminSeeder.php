<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $superAdmin = User::factory()->create([
            'email' => 'superadmin@test.com'
        ]);

        $superAdmin->assignRole('superior');

        $admins = User::factory(3)->state(new Sequence(
            ['email' => 'admin1@test.com'],
            ['email' => 'admin2@test.com'],
            ['email' => 'admin3@test.com']
        ))->create();

        $admins->each(function ($admin) {
            $admin->assignRole('admin');
        });
    }
}
