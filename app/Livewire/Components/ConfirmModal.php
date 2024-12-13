<?php

namespace App\Livewire\Components;

use Livewire\Component;

class ConfirmModal extends Component
{
    public $message;
    public $action;
    public $showModal = false;

    public function mount($message, $action)
    {
        $this->message = $message;
        $this->action = $action;
    }

    public function show()
    {
        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function runAction()
    {
        $this->emitTo($this->action, 'actionConfirmed');
        $this->close();
    }


    public function render()
    {
        return view('livewire.components.confirm-modal');
    }
}
