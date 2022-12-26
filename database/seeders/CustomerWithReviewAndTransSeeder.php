<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerWithReviewAndTransSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::factory()->count(20)->create()->each(function ($user) {
            $trans = Transaction::factory()->make();
            $user->transaction()->save($trans);
            // kalo mau byk
            // $trans = Transaction::factory()->count(20)->make();
            // $user->transaction()->saveMany($trans);
            $review = Review::factory()->make(['transaction_id' => $trans]);
            $review->save();
            // $user->review()->save($review);
        });
    }
}
