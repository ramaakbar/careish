<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    public function index() {
        return view('post.posts');
    }

    public function post(Post $post) {
        // dd($post->view);
        // setiap buka pagenya, view nambah 1
        $post->view = $post->view + 1;
        $post->save();
        return view('post.post', [
            'post' => $post
        ]);
    }

    public function comment(Post $post, Request $request) {
        $validated = $request->validate([
            'comment' => ['required'],
        ]);
        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'comment' => $validated['comment'],
        ]);
        return redirect('/articles/' . $post->id);
    }
}
