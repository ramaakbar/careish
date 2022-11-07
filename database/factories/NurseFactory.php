<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nurse>
 */
class NurseFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'name' => fake()->name(),
            'age' => fake()->numberBetween(20, 40),
            'gender_id' => fake()->numberBetween(1, 2),
            'city_id' => fake()->numberBetween(1, 300), // password
            'picture' => 'assets/placeholder_man.jpeg',
            'availability_id' => fake()->numberBetween(1, 3),
            'description' => fake()->realText(900),
            'skills' => fake()->word(1) . ';' . fake()->word(1) . ';' . fake()->word(1),
            'price' => fake()->numberBetween(1000000, 5000000),
        ];
    }
}
