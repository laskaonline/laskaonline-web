<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $superAdmin = User::create([
            'email'     => 'superadmin@test.com',
            'name'      => 'Super Admin',
            'no_ktp'    => '1671070104960011',
            'phone'     => '085267902951',
            'password'  => bcrypt('@SuperAdmin123'),
        ]);

        $superAdmin->assignRole('superior');

        $admins = User::create([
            'email'     => 'fauzan@test.com',
            'name'      => 'Fauzan',
            'no_ktp'    => '1671070104960012',
            'phone'     => '085267902952',
            'password'  => bcrypt('@Admin123'),
        ]);

        $admins->each(function ($admin) {
            $admin->assignRole('admin');
        });
    }
}
