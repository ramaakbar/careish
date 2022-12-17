<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Chat;

class ChatSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    $users = User::all();
    Chat::factory(20)->make()->each(function ($chat) use ($users) {
      $chat->user_id = $users->random()->id;
      $chat->receiver = User::where('role_id', 2)->first()->id;
      $chat->save();
    });
  }
}
