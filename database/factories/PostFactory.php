<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'post_category_id' => fake()->numberBetween(1, 3),
            'title' => fake()->text(),
            'body' => fake()->randomHtml(10, 4)
        ];
    }
}
