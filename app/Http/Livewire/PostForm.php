<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostForm extends Component
{

    public $body;

    protected $rules = [
        'body' => 'required'
    ];

    public function storePost() {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.post-form');
    }
}
