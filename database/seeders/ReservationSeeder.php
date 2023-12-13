<?php

namespace Database\Seeders;

use App\Models\reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        reservation::create([
            'name' => 'John Doe',
            'phone_number' => '123456789',
            'email' => 'john@gmail.com',
            'date' => '2023-12-12',
            'time' => '12:00',
            'guests' => '2',
            'message' => 'Hello, I would like to reserve a table for two.',
        ]);
        
    }
}
