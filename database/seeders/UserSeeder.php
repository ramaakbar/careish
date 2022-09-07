<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
            'phone_number' => '081323223',
            'role_id' => 2,
            'picture' => 'assets/placeholder_man.jpeg'
        ]);
        
        User::factory()->count(20)->create();
    }
}
