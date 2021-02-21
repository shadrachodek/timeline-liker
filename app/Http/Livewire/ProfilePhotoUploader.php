<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilePhotoUploader extends Component
{
    use WithFileUploads;

    public $photo;

    public function render()
    {
        return view('livewire.profile-photo-uploader');
    }
}
