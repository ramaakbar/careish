<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call([
            AvailabilitySeeder::class,
            GenderSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            ProvinceCitySeeder::class,
            NurseSeeder::class,
            DurationSeeder::class,
            StatusSeeder::class,
            PaymentTypeSeeder::class,
            TransactionSeeder::class,
            ReviewSeeder::class,
            SavedNursesSeeder::class,
        ]);
    }
}
