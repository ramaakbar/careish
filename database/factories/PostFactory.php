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
        $created = fake()->dateTimeThisYear()->getTimestamp();
        return [
            'post_category_id' => fake()->numberBetween(1, 3),
            'title' => fake()->text(),
            'thumbnail' => 'post-thumbs/elderthumb.jpg',
            'body' => fake()->randomHtml(10, 4),
            'created_at' => $created,
            'updated_at' => $created,
            'view' => fake()->numberBetween(1, 10)
        ];
    }
}
