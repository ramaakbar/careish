<?php

namespace Database\Seeders;

use App\Models\Duration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DurationSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Duration::create([
            'duration' => '1 Day',
        ]);

        Duration::create([
            'duration' => '3 Days',
        ]);

        Duration::create([
            'duration' => '1 Week',
        ]);

        Duration::create([
            'duration' => '2 Week',
        ]);

        Duration::create([
            'duration' => '1 Month',
        ]);
    }
}
