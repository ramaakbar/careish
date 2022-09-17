<?php

namespace Database\Seeders;

use App\Models\Duration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Duration::create([
            'duration' => '1 Day',
            'price' => 400000,
        ]);

        Duration::create([
            'duration' => '3 Days',
            'price' => 1200000,
        ]);

        Duration::create([
            'duration' => '1 Week',
            'price' => 2400000,
        ]);

        Duration::create([
            'duration' => '2 Week',
            'price' => 3000000,
        ]);

        Duration::create([
            'duration' => '1 Month',
            'price' => 6000000,
        ]);
    }
}
