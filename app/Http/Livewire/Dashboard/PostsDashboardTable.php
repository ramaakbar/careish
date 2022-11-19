<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSorting as TraitsWithSorting;
use Illuminate\Support\Facades\DB;

class PostsDashboardTable extends Component {
    use WithPagination;

    use TraitsWithSorting;

    public $post_category_id = '';

    public $deleteId = '';

    public function getDeleteId($id) {
        $this->deleteId = $id;
    }

    public function delete() {
        Post::destroy($this->deleteId);
        session()->flash('success', 'Post no ' . $this->deleteId . ' has successfully been deleted');
        return redirect()->to('/dashboard/posts');
    }

    public function render() {

        if ($this->post_category_id == '') {
            $posts = empty($this->search) ? DB::table('posts')
                ->join('post_categories', 'posts.post_category_id', '=', 'post_categories.id')
                ->select('posts.*', 'post_categories.category as category')
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage)
                : DB::table('posts')
                ->join('post_categories', 'posts.post_category_id', '=', 'post_categories.id')
                ->select('posts.*', 'post_categories.category as category')
                ->orWhere('posts.id', 'like', '%' . $this->search . '%')
                ->orWhere('posts.title', 'like', '%' . $this->search . '%')
                ->orWhere('post_categories.category', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage);
        } else {
            $posts = empty($this->search) ? DB::table('posts')
                ->join('post_categories', 'posts.post_category_id', '=', 'post_categories.id')
                ->select('posts.*', 'post_categories.category as category')
                ->where('post_category_id', '=', $this->post_category_id)
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage)
                : DB::table('posts')
                ->join('post_categories', 'posts.post_category_id', '=', 'post_categories.id')
                ->select('posts.*', 'post_categories.category as category')
                ->where('post_category_id', '=', $this->post_category_id)
                ->where(function ($query) {
                    $query->where('posts.id', 'like', '%' . $this->search . '%')
                        ->orWhere('posts.title', 'like', '%' . $this->search . '%')
                        ->orWhere('post_categories.category', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sort, $this->sortOrder)
                ->paginate($this->perPage);
        }
        return view('livewire.dashboard.posts-dashboard-table', [
            'posts' => $posts,
            'categories' => PostCategory::get(),
        ]);
    }
}
