<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Livewire\Component\Trix;
use App\Models\Post;
use App\Models\PostCategory;
use Livewire\Component;

class CreatePostForm extends Component {
    public $title;
    public $category = 1;
    public $body;

    public $listeners = [
        Trix::EVENT_VALUE_UPDATED // trix_value_updated()
    ];

    public function trix_value_updated($value) {
        $this->body = $value;
    }

    public function clear() {
        $this->resetErrorBag();
        $this->reset(['title', 'category', 'body']);
    }

    protected $rules = [
        'title' => 'required',
        'category' => 'required|min:1|max:3',
        'body' => 'required',
    ];

    public function save() {
        $this->validate();
        // dd([
        //     'title' => $this->title,
        //     'category' => $this->category,
        //     'body' => $this->body
        // ]);
        Post::updateOrCreate([
            'title' => $this->title,
            'post_category_id' => $this->category,
            'body' => $this->body
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
