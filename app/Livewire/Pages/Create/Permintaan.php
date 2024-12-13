<?php

namespace App\Livewire\Pages\Create;

use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Permintaan extends Component
{

    public $barang, $barang_id, $jumlah;
    public function save()
    {
        $this->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|numeric|min:1',
        ], [
            'barang_id.required' => 'Mohon Pilih Barang',
            'barang_id.exists' => 'Barang Pilihan Anda Tidak ada/Sudah Tidak ada',
            'jumlah.required' => 'Mohon Isi Jumlah Barang',
            'jumlah.numeric' => 'Jumlah Barang Harus Berupa Angka',
            'jumlah.min' => 'Minimal Jumlah Barang Diminta Adalah 1'
        ]);

        \App\Models\Permintaan::create([
            'barang_id' => $this->barang_id,
            'jumlah' => $this->jumlah,
            'user_id' => Auth::user()->id
        ]);
        $this->dispatch('permintaan-created');
        $this->reset('barang', 'barang_id', 'jumlah');
        $this->mount();
    }

    public function mount()
    {
        $this->barang = Barang::all();
    }
    public function render()
    {
        return view('livewire.pages.create.permintaan');
    }
}
