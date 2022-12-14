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
        $a = array("Jawa", "Sunda", "Banten", "NTT", "Lampung", "Madura", "Melayu");
        $test = array_rand($a);
        return [
            'name' => fake()->name(),
            'age' => fake()->numberBetween(20, 40),
            'gender_id' => fake()->numberBetween(1, 2),
            'city_id' => fake()->numberBetween(1, 300), // password
            'picture' => 'nurse-images/placeholder_man.jpeg',
            'availability_id' => fake()->numberBetween(1, 3),
            'description' => fake()->realText(900),
            'skills' => fake()->word(1) . ';' . fake()->word(1) . ';' . fake()->word(1),
            'price' => fake()->numberBetween(2000000, 5000000),
            'ethnicity' => $a[$test]
        ];
    }
}
