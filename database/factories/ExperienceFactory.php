<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'nurse_id' => fake()->numberBetween(1, 20),
            'date' => Carbon::createFromFormat('Y-m-d H:i:s', Carbon::now())->subYear(fake()->numberBetween(1, 4)),
            'title' => fake()->name() . " Course",
            'description' => fake()->realText(50)
        ];
    }
}
