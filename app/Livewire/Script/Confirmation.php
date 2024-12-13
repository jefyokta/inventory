<?php

namespace App\Livewire\Script;

use App\Livewire\Pages\TambahBarang;
use App\Models\Barang;
use Livewire\Attributes\On;
use Livewire\Component;

class Confirmation extends Component
{

    #[On('confirmed')]
    public function confirmed($class, $event, $param)
    {
        // dd($class,$event,$param);
        $this->dispatch($event, $param)->to($class);
    }
    public function render()
    {
        return view('livewire.script.confirmation');
    }
}
