<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\WithSorting as TraitsWithSorting;
use Illuminate\Support\Facades\DB;
use WireUi\Traits\Actions;

class PostsDashboardTable extends Component {
    use WithPagination;

    use TraitsWithSorting;

    use Actions;

    public $post_category_id = '';

    public $deleteId = '';

    public function delete($postId) {
        Post::destroy($postId);
        session()->flash('success', 'Post no ' . $postId . ' has successfully been deleted');
        return redirect()->to('/dashboard/posts');
    }

    public function deleteConfirm($postId) {
        $this->dialog()->confirm([
            'title'       => 'Confirmation',
            'description' => 'Are you sure you want to delete this
            post?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, Im sure',
                'method' => 'delete',
                'params' => $postId
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
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
