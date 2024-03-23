<?php

namespace App\Http\Livewire\Laporan;
use App\Models\tblorderheader;
use PDF;
use Livewire\Component;

class Cetak extends Component
{

    public function tampil()
    {
        $pemesanan = tblorderheader::vieworderall();
        $pdf = PDF::loadview('livewire.laporan.display',['pemesanan'=>$pemesanan])->setPaper('A4','potrait')->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('Laporan-Pemesanan.pdf');
    }
    public function render()
    {
        tampil();
    }
}
