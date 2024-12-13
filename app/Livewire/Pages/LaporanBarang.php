<?php

namespace App\Livewire\Pages;

use App\Models\Barang;
use Livewire\Component;

class LaporanBarang extends Component
{

    public $barang;

    public function mount(){
        $this->barang = Barang::all();
    }
    public function render()
    {
        return view('livewire.pages.laporan-barang');
    }
}
