<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'role_id',
        'picture',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo(Role::class);
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

    public function chat() {
        return $this->hasMany(Chat::class);
    }

    public static function search($search) {
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%' . $search . '%')->orWhere('name', 'like', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%')->orWhere('phone_number', 'like', '%' . $search . '%')->orWhere('created_at', 'like', '%' . $search . '%');
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }
}
