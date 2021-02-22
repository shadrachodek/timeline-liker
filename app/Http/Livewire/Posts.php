<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public $posts;

    protected $listeners = [
        'echo:post,PostCreated' => 'prependPost',
        'echo:post-deleted,PostDeleted' => 'refreshPost',
    ];

    public function mount() {
        $this->posts = Post::with('user', 'likes')->latest()->take(100)->get();
    }

    public function prependPost($post) {
        $this->posts->prepend(Post::find($post['id']));
    }

    public function refreshPost() {
        $this->posts = $this->posts->fresh();
    }


    public function render()
    {
        return view('livewire.posts');
    }
}
