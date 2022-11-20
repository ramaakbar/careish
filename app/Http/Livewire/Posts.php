<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\PostCategory;
use App\Traits\WithSorting as TraitsWithSorting;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component {
    use WithPagination;
    use TraitsWithSorting;

    public $category = '';

    public function render() {
        if ($this->category == '') {
            $posts = empty($this->search) ? DB::table('posts')
                ->join('post_categories', 'posts.post_category_id', '=', 'post_categories.id')
                ->select('posts.*', 'post_categories.id as postCategoriesId', 'post_categories.category as category')
                ->orderBy('created_at', 'desc')
                ->paginate(7)
                : DB::table('posts')
                ->join('post_categories', 'posts.post_category_id', '=', 'post_categories.id')
                ->select('posts.*', 'post_categories.id as postCategoriesId', 'post_categories.category as category')
                ->where('posts.title', 'like', '%' . $this->search . '%')
                ->orderBy('created_at', 'desc')
                ->paginate(7);
        } else {
            $posts = empty($this->search) ? DB::table('posts')
                ->join('post_categories', 'posts.post_category_id', '=', 'post_categories.id')
                ->select('posts.*', 'post_categories.id as postCategoriesId', 'post_categories.category as category')
                ->where('posts.post_category_id', '=', $this->category)
                ->orderBy('created_at', 'desc')
                ->paginate(7)
                : DB::table('posts')
                ->join('post_categories', 'posts.post_category_id', '=', 'post_categories.id')
                ->select('posts.*', 'post_categories.id as postCategoriesId', 'post_categories.category as category')
                ->where('posts.post_category_id', '=', $this->category)
                ->where(function ($query) {
                    $query->where('posts.title', 'like', '%' . $this->search . '%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate(7);
        }
        return view('livewire.posts', [
            'posts' => $posts,
            'categories' => PostCategory::get(),
        ]);
    }
}
