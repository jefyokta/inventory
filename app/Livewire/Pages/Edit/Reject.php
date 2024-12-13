<?php

namespace App\Livewire\Pages\Edit;

use App\Livewire\Pages\Create\Permintaan as CreatePermintaan;
use App\Livewire\Pages\Permintaan as PagesPermintaan;
use App\Models\Notification;
use App\Models\Permintaan;
use Livewire\Component;

class Reject extends Component
{
    public $permintaan;
    public $message;

    public function reject()
    {
        $message = $this->message;
        $permintaan = $this->permintaan;
        Notification::insert(['permintaan_id' => $permintaan->id, 'message' => $message, 'created_at' => now()]);
        $permintaan->update(['status' => 'rejected']);
        $this->dispatch('rejected');
        // $this->redirect(route('permintaan.index'));
    }
    public function mount(Permintaan $permintaan)
    {

        $this->permintaan = $permintaan;
    }
    public function render()
    {
        return view('livewire.pages.edit.reject');
    }
}
