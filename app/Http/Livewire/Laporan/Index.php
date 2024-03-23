<?php

namespace App\Http\Livewire\Laporan;
use App\Models\tblorderheader;
use PDF;
use Livewire\Component;

class Index extends Component
{
    public $tglawal;
    public $tglakhir;
    public $token;

    protected $rules = [
        'tglawal' => 'required',
        'tglakhir' => 'required'
    ];
    public function render()
    {
        return view('livewire.laporan.index');
    }
    public function tampil()
    {
        return redirect()->route('laporan.display', ['tglawal' => $this->tglawal, 'tglakhir' => $this->tglakhir]);
        // $this->token = tblorderheader::vieworderbydate($this->tglawal, $this->tglakhir);
        // $pdf = PDF::loadview('livewire.laporan.index',['pemesanan'=>$this->token])->setPaper('A4','potrait')->setOptions(['defaultFont' => 'sans-serif']);
        // return $pdf->stream('Laporan-Pemesanan.pdf');
    }
}
