<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public $posts;

    protected $listeners = [
        'echo:post,PostCreated' => 'prependPost',
    ];

    public function mount() {
        $this->posts = Post::latest()->take(100)->get();
    }

    public function prependPost($post) {
        $this->posts->prepend(Post::find($post['id']));
    }


    public function render()
    {
        return view('livewire.posts');
    }
}
