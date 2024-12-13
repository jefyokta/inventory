<?php

namespace App\Livewire\Pages;

use App\Models\User;
use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Perakitan extends Component
{

    public $employees, $user_id, $barang_id, $barang, $jumlah;


    public function save()
    {
        $v =       $this->validate([
            'user_id' => "required|exists:users,id",
            "barang_id" => "required|exists:barangs,id",
            'jumlah' => "required|numeric|min:1"
        ], [
            'user_id.required' => 'User harus dipilih.',
            'user_id.exists' => 'User yang dipilih tidak valid.',
            'barang_id.required' => 'Barang harus dipilih.',
            'barang_id.exists' => 'Barang yang dipilih tidak valid.',
            'jumlah.required' => 'Jumlah barang harus diisi.',
            'jumlah.numeric' => 'Jumlah barang harus berupa angka.',
            'jumlah.min' => 'Jumlah barang minimal 1.'
        ]);
        DB::beginTransaction();
        try {
            if ($v['jumlah'] > Barang::find($v['barang_id'])->stock ?? 0) {
                DB::rollBack();
                $this->dispatch('peminjaman-error', 'Jumlah Peminjaman melebihi stok dikantor');
                return;
            }

            if (User::find($v['user_id'])->role !== 'karyawan') {
                DB::rollBack();
                $this->dispatch('peminjaman-error', 'Karyawan tidak ditemukan');
                return;
            }
            $v['borrowed_at'] = now();
            Peminjaman::insert($v);
            Barang::find($v['barang_id'])->decrement('stock', $v['jumlah']);
            DB::commit();
            $this->dispatch('peminjaman-created');
            $this->mount();
        } catch (\Throwable $th) {
            DB::rollBack();
            $this->dispatch('peminjaman-error', $th->getMessage());
        }
    }
    public function mount()
    {

        $this->employees = User::where('role', 'karyawan')->get();
        $this->barang = Barang::where('stock', '>', 0)->get();
    }
    public function render()
    {
        return view('livewire.pages.perakitan');
    }
}
