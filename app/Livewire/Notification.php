<?php

namespace App\Livewire;

use App\Models\Notification as ModelsNotification;
use Livewire\Component;

class Notification extends Component
{

    public $notifications;
    public function mount()
    {
        $this->notifications = ModelsNotification::all();
    }
    public function render()
    {
        return view('livewire.notification');
    }
}
