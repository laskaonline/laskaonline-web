<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $visitor = User::create([
            'name'      => 'Visitor',
            'no_ktp'    => '1671070104960013',
            'phone'     => '085267902953',
            'password'  => bcrypt('@Visitor123'),
        ]);

        $visitor->assignRole('visitor');
    }
}
