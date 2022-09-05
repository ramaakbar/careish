<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = [
        'availability',
    ];

    public function nurse() {
        return $this->hasMany(Nurse::class);
    }
}
