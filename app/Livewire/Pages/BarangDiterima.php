<?php

namespace App\Livewire\Pages;

use App\Models\Barang;
use Livewire\Component;

class BarangDiterima extends Component
{
    public $barangs;
    public function mount()
    {
        $this->barangs =  Barang::where('rafted', 0)->orWhere('rafted',null)->get();
        // dd($this->barang);
    }
    public function render()
    {
        return view('livewire.pages.barang-diterima');
    }
}
