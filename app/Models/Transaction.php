<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nurse_id',
        'status_id',
        'city_id',
        'duration_id',
        'payment_type_id',
        'total_price',
        'start_date',
        'end_date',
        'address',
    ];

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function nurse() {
        return $this->belongsTo(Nurse::class);
    }

    public function duration() {
        return $this->belongsTo(Duration::class);
    }

    public function payment_type() {
        return $this->hasMany(PaymentType::class);
    }
}
