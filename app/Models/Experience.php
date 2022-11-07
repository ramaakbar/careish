<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model {
    use HasFactory;

    protected $fillable = [
        'nurse_id',
        'date',
        'title',
        'description'
    ];

    public function nurse() {
        return $this->belongsTo(Nurse::class);
    }
}
