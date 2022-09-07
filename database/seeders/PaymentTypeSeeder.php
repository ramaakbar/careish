<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create([
            'type' => 'Visa'
        ]);

        PaymentType::create([
            'type' => 'Credit Card'
        ]);

        PaymentType::create([
            'type' => 'GoPay'
        ]);

        PaymentType::create([
            'type' => 'QRIS'
        ]);

        PaymentType::create([
            'type' => 'Bank Transfer'
        ]);
    }
}
