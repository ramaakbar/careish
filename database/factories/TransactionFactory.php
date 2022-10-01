<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition() {
        $startDate = Carbon::createFromTimeStamp(fake()->dateTimeThisYear()->getTimestamp());
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addDays(fake()->numberBetween(6, 90));
        return [
            'user_id' => fake()->numberBetween(2, 21),
            'nurse_id' => fake()->numberBetween(1, 50),
            'status_id' => fake()->numberBetween(1, 3),
            'city_id' => fake()->numberBetween(1, 300),
            'duration_id' => fake()->numberBetween(1, 5),
            'payment_type_id' => fake()->numberBetween(1, 5),
            'total_price' => fake()->numberBetween(300000, 6000000),
            'start_date' => $startDate,
            'end_date' => $endDate, // start_date + durasi duration_id
            'address' => fake()->streetAddress(),
        ];
    }
}
