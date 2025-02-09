<?php

namespace App\Livewire\Pages;

use App\Models\Permintaan;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Component;

class Keseluruhan extends Component
{
    public $permintaan, $start, $end;
    public function export()
    {
        $permintaan = Permintaan::query();

        if (strlen($this->start) > 0 && strlen($this->end) > 0) {
            $permintaan->whereBetween('created_at', [$this->start, $this->end]);
        }

        $data = $permintaan->get();

        $permintaan = $data->map(function ($item) {
            foreach ($item->toArray() as $key => $value) {
                $item->$key = is_string($value) ? mb_convert_encoding($value, 'UTF-8', 'UTF-8') : $value;
            }
            return $item;
        });

        $pdf = Pdf::loadView('export.permintaan', compact('permintaan'))
            // ->setPaper('a4', 'landscape')
            ->setOption('defaultFont', 'DejaVu Sans');
        return response()->streamDownload(
            fn() => print($pdf->output()),
            'laporan_permintaan.pdf'
        );
    }
    public function mount()
    {
        $this->permintaan = Permintaan::all();
    }
    public function render()
    {
        return view('livewire.pages.keseluruhan');
    }
}
