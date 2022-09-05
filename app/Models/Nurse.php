<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender_id',
        'address',
        'picture',
        'availability_id',
    ];

    public function availability() {
        return $this->belongsTo(Availability::class);
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }
}
