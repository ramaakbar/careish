<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ChatFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition() {
    return [
      'message' => $this->faker->sentence(),
      'is_seen' => 0
    ];
  }
}
