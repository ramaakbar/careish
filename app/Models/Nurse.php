<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender_id',
        'city_id',
        'picture',
        'availability_id',
        'description',
        'skills',
        'price',
        'ethnicity'
    ];

    public function availability() {
        return $this->belongsTo(Availability::class);
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function transaction() {
        return $this->hasMany(Transaction::class);
    }

    public function review() {
        return $this->hasMany(Review::class);
    }

    public function savedNurse() {
        return $this->hasMany(SavedNurse::class);
    }

    public static function search($search) {
        return empty($search) ? static::query()
            : static::query()->where('nurses.id', 'like', '%' . $search . '%')->orWhere('nurses.name', 'like', '%' . $search . '%')->orWhere('cities.name', 'like', '%' . $search . '%')->orWhere('provinces.name', 'like', '%' . $search . '%');
    }

    public function experience() {
        return $this->hasMany(Experience::class);
    }
}
