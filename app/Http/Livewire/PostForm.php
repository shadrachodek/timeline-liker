<?php

namespace App\Http\Livewire;

use App\Events\PostCreated;
use App\Events\postEdited;
use App\Models\Post as PostModel;
use Livewire\Component;

class PostForm extends Component
{

    public $body;
    public $edit = false;
    public $postId;
    public $action = "storePost";

    protected $rules = [
        'body' => 'required'
    ];

    public function resetFilters()
    {
        $this->reset(['action', 'edit', 'body', 'postId']);
    }

    public function getListeners()
    {
        return [
            'echo:edit-post.' . auth()->id() .',EditPost' => 'editPost',
        ];
    }

    public function storePost() {
        $this->validate();

        $post = auth()->user()->posts()->create(['body' => $this->body]);
        broadcast(new PostCreated($post));
        $this->reset();
    }

    public function storeEditedPost() {
        $this->validate();

        $post = PostModel::find($this->postId);
        $post->update(['body' => $this->body]);

        broadcast(new PostEdited($post));
        $this->reset();
    }

    public function editPost($post) {
        $this->body = $post['post']['body'];
        $this->postId = $post['post']['id'];
        $this->edit = true;
        $this->action = 'storeEditedPost';
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}
