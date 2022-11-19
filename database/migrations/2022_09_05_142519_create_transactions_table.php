<?php

use App\Models\City;
use App\Models\Duration;
use App\Models\User;
use App\Models\Nurse;
use App\Models\PaymentType;
use App\Models\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Nurse::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(Status::class)->constrained();
            $table->foreignIdFor(City::class)->constrained();
            $table->foreignIdFor(PaymentType::class)->constrained();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('transactions');
    }
};
