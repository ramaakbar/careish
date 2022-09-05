<?php

namespace Database\Seeders;

use App\Models\Availability;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AvailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Availability::create([
            'availability' => 'Not Available'
        ]);

        Availability::create([
            'availability' => 'On Duty'
        ]);

        Availability::create([
            'availability' => 'Available'
        ]);
    }
}
