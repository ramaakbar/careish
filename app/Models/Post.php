<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    use HasFactory;

    protected $fillable = [
        'post_category_id',
        'title',
        'thumbnail',
        'body',
        'view'
    ];

    public function post_category() {
        return $this->belongsTo(PostCategory::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }
}
