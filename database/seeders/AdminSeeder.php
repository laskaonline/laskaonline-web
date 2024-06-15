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
            'name'      => 'Super Admin',
            'no_ktp'    => '1671070104960011',
            'phone'     => '089658805412',
            'password'  => bcrypt('@SuperAdmin123'),
        ]);

        $superAdmin->assignRole('superior');

        $admin = User::create([
            'name'      => 'Alwi',
            'no_ktp'    => '1671070104960012',
            'phone'     => '089658805413',
            'password'  => bcrypt('@Admin123'),
        ]);

        $admin->assignRole('admin');
    }
}
