<?php

namespace Database\Seeders;

use App\Models\SavedNurses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SavedNursesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        SavedNurses::factory()->count(30)->create();
    }
}
