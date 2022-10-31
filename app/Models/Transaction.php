<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
    use HasFactory;

    protected $dates = ['start_date', 'end_date'];

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
        return $this->belongsTo(PaymentType::class);
    }

    public function review() {
        return $this->hasOne(Review::class);
    }

    public static function search($search) {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%');
    }
}
