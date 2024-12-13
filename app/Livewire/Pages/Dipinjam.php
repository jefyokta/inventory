<?php

namespace App\Livewire\Pages;

use App\Models\Barang;

use Livewire\Component;
use App\Models\Peminjaman;
use Livewire\Attributes\On;

class Dipinjam extends Component
{
    public $barang;

    #[On('returned')]
    public function kembali(int $id)
    {
        $p = Peminjaman::find($id);
        if (!$p) {
            $this->dispatch('error-kembali', 'peminjaman tidak ditemukan');
            return;
        }

        if ($p->returned_at) {
            $this->dispatch('error-kembali', 'peminjaman ini sudah dikembalikan');
            return;
        }
        $jumlah = $p->jumlah;
        $barang = Barang::find($p->barang_id);

        if (!$barang) {
            $this->dispatch('error-kembali', 'Barang tidak ditemukan/terhapus!');
            return;
        }
        if ($barang->increment('stock', $jumlah) || 0 > 0) {
            $barang->update(['rafted' => true]);
            $p->update(['returned_at' => now()]);
            $this->dispatch('success-kembali');
            $this->mount();
        } else {

            $this->dispatch('error-kembali', 'Terjadi Kesalahan saat menyimpan data!');
        }
    }

    public function confirm($id)
    {

        $this->dispatch('confirmation', json_encode([
            "message" => "Kembalikan barang ini?",
            "event" => "returned",
            "className" => "App\Livewire\Pages\Dipinjam",
            "param" => $id
        ]));
    }


    public function mount()
    {
        $this->barang = Peminjaman::all();
    }
    public function render()
    {
        return view('livewire.pages.dipinjam');
    }
}
