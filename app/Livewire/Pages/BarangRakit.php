<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class BarangRakit extends Component
{
    public $barang;
    public $start = '';
    public $end = '';
    public function export()
    {
        $peminjaman = Peminjaman::query();

        if (strlen($this->start) > 0 && strlen($this->end) > 0) {
            $peminjaman->whereBetween('borrowed_at', [$this->start, $this->end]);
        }

        $data = $peminjaman->where('user_id', Auth::user()->id)->get();

        $peminjaman = $data->map(function ($item) {
            foreach ($item->toArray() as $key => $value) {
                $item->$key = is_string($value) ? mb_convert_encoding($value, 'UTF-8', 'UTF-8') : $value;
            }
            return $item;
        });

        $pdf = Pdf::loadView('export.peminjaman', compact('peminjaman'))
            // ->setPaper('a4', 'landscape')
            ->setOption('defaultFont', 'DejaVu Sans');
        return response()->streamDownload(
            fn() => print($pdf->output()),
            'laporan_peminjaman_'.Auth::user()->name.'.pdf'
        );
    }
    public function mount()
    {
        $this->barang = Peminjaman::where('user_id', Auth::user()->id)->get();
    }
    public function render()
    {
        return view('livewire.pages.barang-rakit');
    }
}
