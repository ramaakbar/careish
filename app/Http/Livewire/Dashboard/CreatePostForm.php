<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Livewire\Component\Trix;
use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePostForm extends Component {
    use WithFileUploads;
    public $title;
    public $category = 1;
    public $thumbnail;
    public $body;

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function trix_value_updated($value) {
        $this->body = $value;
    }

    public function clear() {
        $this->resetErrorBag();
        $this->reset(['title', 'category', 'body', 'thumbnail']);
    }

    protected $rules = [
        'title' => 'required',
        'category' => 'required|min:1|max:3',
        'body' => 'required',
        'thumbnail' => 'required|image|max:2048',
    ];

    public function save() {
        $this->validate();
        $storedImage = $this->thumbnail->store('post-thumbs');
        Post::Create([
            'title' => $this->title,
            'post_category_id' => $this->category,
            'thumbnail' => $storedImage,
            'body' => $this->body,
            'view' => 0
        ]);
        $this->clear();
        session()->flash('success', 'Post successfully created');
        return redirect()->to('/dashboard/posts');
    }
    public function render() {
        return view('livewire.dashboard.create-post-form', [
            'categories' => PostCategory::get(),
        ]);
    }
}
