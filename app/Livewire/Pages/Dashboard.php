<?php

namespace App\Livewire\Pages;

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $employees;
    public $total;
    public $peminjaman;

    public $empeminjaman;


    public function mount()
    {
        // dd(Peminjaman::all());
        $this->employees = User::where('role', 'karyawan')->count();
        $this->total = Barang::sum('stock');
        $this->peminjaman = Peminjaman::whereDate('borrowed_at', date('Y-m-d'))->count();
        $this->empeminjaman = User::with(['peminjaman'])->where('role', 'karyawan')->get();
        // dd($this->empeminjaman[4]->peminjaman()->count());
    }
    public function render()
    {
        return view('livewire.pages.dashboard');
    }
}
