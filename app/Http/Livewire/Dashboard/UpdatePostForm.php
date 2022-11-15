<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Livewire\Component\Trix;
use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePostForm extends Component {
    use WithFileUploads;

    public Post $post;
    public $title;
    public $category = 1;
    public $thumbnail;
    public $oldThumbnail;
    public $body;

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function trix_value_updated($value) {
        $this->body = $value;
    }

    public function mount() {
        $this->title = $this->post->title;
        $this->category = $this->post->post_category_id;
        $this->oldThumbnail = $this->post->thumbnail;
        $this->body = $this->post->body;
    }

    public function clear() {
        $this->resetErrorBag();
        $this->reset(['title', 'category', 'body', 'thumbnail']);
    }

    protected $rules = [
        'title' => 'required',
        'category' => 'required|min:1|max:3',
        'body' => 'required',
        'thumbnail' => 'nullable|image|max:2048',
    ];

    public function save() {
        $this->validate();
        $updatedPost = [
            'title' => $this->title,
            'post_category_id' => $this->category,
            'body' => $this->body
        ];
        if ($this->thumbnail) {
            $updatedPost['thumbnail'] = $this->thumbnail->store('post-thumbs');
        }
        Post::where('id', $this->post->id)->update($updatedPost);
        $this->clear();
        session()->flash('success', 'Post successfully updated');
        return redirect()->to('/dashboard/posts');
    }
    public function render() {
        return view('livewire.dashboard.update-post-form', [
            'categories' => PostCategory::get(),
        ]);
    }
}
