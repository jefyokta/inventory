<?php

namespace App\Livewire\Pages;

use App\Models\Barang;
use App\Models\Notification;
use App\Models\Permintaan as ModelsPermintaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Permintaan extends Component
{
    public $permintaan;

    public function reject(ModelsPermintaan $permintaan, $message)
    {
        if (Auth::user()->role !== 'gudang') {
            $this->dispatch('error', "Hak akses ditolak");
            return;
        }
        Notification::insert(['permintaan_id' => $permintaan->id, 'message' => $message, 'created_at' => now()]);
        $permintaan->update(['status' => 'rejected']);
        $this->dispatch('rejected');
        $this->mount();
    }
    public function accept(ModelsPermintaan $permintaan)
    {
        if (Auth::user()->role !== 'gudang') {
            $this->dispatch('error', "Hak akses ditolak");
            return;
        }
        // Barang::where('id', $permintaan->barang_id)->increment('stock', $permintaan->jumlah);
        $time = now();
        $permintaan->update(['status' => 'accepted', 'accepted_at' => $time]);
        Notification::insert(['permintaan_id' => $permintaan->id, 'message' => '', 'created_at' => $time]);
        $this->dispatch('accepted');
        $this->mount();
    }

    public function acceptReceived(ModelsPermintaan $permintaan)
    {
        if (Auth::user()->role !== 'karyawan') {
            $this->dispatch('error', "Hak akses ditolak");
            return;
        }
        $permintaan->update(['checked' => 'accepted']);
        Barang::where('id', $permintaan->barang_id)->increment('stock', $permintaan->jumlah);
        $this->dispatch('accepted');
        $this->mount();
    }

    public function rejectReceived(ModelsPermintaan $permintaan)
    {
        if (Auth::user()->role !== 'karyawan') {
            $this->dispatch('error', "Hak akses ditolak");
            return;
        }
        $permintaan->update(['checked' => 'accepted']);
        $this->dispatch('rejected');
        $this->mount();
    }
    public function mount()
    {
        if (Auth::user()->role === 'karyawan') {
            $this->permintaan = ModelsPermintaan::where('status','accepted')->where('checked',null)->get();
        }else{

            $this->permintaan = ModelsPermintaan::all();
        }
    }
    public function render()
    {
        return view('livewire.pages.permintaan');
    }
}
