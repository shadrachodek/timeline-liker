<?php

namespace App\Http\Livewire;

use App\Events\PostCreated;
use Livewire\Component;

class PostForm extends Component
{

    public $body;

    protected $rules = [
        'body' => 'required'
    ];

    public function storePost() {
        $this->validate();

        $post = auth()->user()->posts()->create(['body' => $this->body]);
        broadcast(new PostCreated($post));
        $this->body = '';
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}
