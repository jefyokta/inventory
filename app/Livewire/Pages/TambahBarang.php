<?php

namespace App\Livewire\Pages;

use App\Models\Barang;
use Livewire\Attributes\On;
use Livewire\Component;

class TambahBarang extends Component
{
    public $barang;


    public function confirmDelete($id)
    {
        $this->dispatch('confirmation', json_encode([
            "message" => "Hapus Barang Ini?",
            "className" => "App\Livewire\Pages\TambahBarang",
            "event" => "delete",
            "param" => $id
        ]));
    }

    #[On('delete')]
    public function delete(Barang $barang)
    {
        $barang->delete();
        $this->dispatch('deleted');
        $this->mount();
    }

    public function mount()
    {

        $this->barang = Barang::all();
    }
    public function render()
    {
        return view('livewire.pages.tambah-barang');
    }
}
