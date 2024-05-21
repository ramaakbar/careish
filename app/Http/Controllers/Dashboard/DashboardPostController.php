<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardPostController extends Controller {
    public function posts() {
        return view('dashboard.posts');
    }

    public function createPost() {
        return view('dashboard.create-post');
    }

    public function view(Request $request, Post $post) {
        return view('dashboard.post', [
            'post' => $post
        ]);
    }

    public function edit(Request $request, Post $post) {
        return view('dashboard.update-post', [
            'post' => $post
        ]);
    }
}
