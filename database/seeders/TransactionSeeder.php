<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaction::create(['name' => 'Item Deposit']);
        Transaction::create(['name' => 'Appointment']);
        Transaction::create(['name' => 'Guest Book']);
    }
}
