<?php

namespace App\Http\Livewire;

use App\Events\PostLiked;
use Livewire\Component;

class Post extends Component
{

    public $post;

    public function getListeners()
    {
        return [
            'echo:post.' . $this->post->id . ',PostLiked' => 'refreshPost'
        ];
    }

    public function refreshPost() {
        $this->post = $this->post->fresh();
    }

    public function storeLike() {
        $like = $this->post->likes()->make();
        $like->user()->associate(auth()->user());
        $like->save();

        broadcast(new PostLiked($this->post));
    }

    public function render()
    {
        return view('livewire.post');
    }
}
