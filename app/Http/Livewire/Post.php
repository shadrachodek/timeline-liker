<?php

namespace App\Http\Livewire;

use App\Events\editPost;
use App\Events\PostLiked;
use Livewire\Component;

class Post extends Component
{

    public $post;

    public function getListeners()
    {
        return [
            'echo:post.' . $this->post->id . ',PostLiked' => 'refreshPost',
            'echo:post-edited.' . $this->post->id . ',PostEdited' => 'refreshPost',
            'echo:user.' . $this->post->user->id . ',ProfilePhotoUpdated' => 'refreshPost',
        ];
    }

    public function refreshPost() {
        $this->post = $this->post->fresh();
    }

    public function editPost() {
        if (auth()->user()->id != $this->post->user->id) {
            return;
        }
        broadcast(new editPost($this->post));
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
