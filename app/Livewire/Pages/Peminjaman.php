<?php

namespace App\Livewire\Pages;

use App\Models\Peminjaman as ModelsPeminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class Peminjaman extends Component
{

    public $barang;
    public $end = '';
    public $start = '';
    public function mount()
    {
        $this->barang = ModelsPeminjaman::all();
    }

    public function export()
    {
        $peminjaman = ModelsPeminjaman::query();

        if (strlen($this->start) > 0 && strlen($this->end) > 0) {
            $peminjaman->whereBetween('borrowed_at', [$this->start, $this->end]);
        }

        $data = $peminjaman->get();

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
            'laporan_peminjaman.pdf'
        );
    }
    public function render()
    {
        return view('livewire.pages.perminjaman');
    }
}
