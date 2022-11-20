<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function index() {
        return view('post.posts');
    }

    public function post(Post $post) {
        return view('post.post', [
            'post' => $post
        ]);
    }
}
