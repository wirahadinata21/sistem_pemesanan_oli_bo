<?php

namespace App\Http\Livewire\Laporan;
use App\Models\tblorderheader;
use PDF;
use Livewire\Component;

class Display extends Component
{
    // protected $listeners = ['cetakin'];
    protected $listeners = ['cetakin'];
    public $token;
    public $token2;

    public function mount($tglawal,$tglakhir)
    {
        $this->token = tblorderheader::vieworderbydate($tglawal, $tglakhir);
        $this->token2 = tblorderheader::vieworderbydate2($tglawal, $tglakhir);
    }

    public function render()
    {    
        
       
        return view('livewire.laporan.display',['pemesanan' =>$this->token]);
    }

    // public function render()
    // {
    //     $pemesanan = tblorderheader::vieworderall();
    //     return view('livewire.laporan.display',compact('pemesanan')); 
    // }
    public function cetakin()
    {
        
        $pdf = PDF::loadview('livewire.laporan.generator',['pemesanan'=>$this->token2])->setPaper('A4','potrait')->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('Laporan-Pemesanan.pdf');
        
    }
    public function generatePdf(): Response
    {
        $pdf = PDF::loadView('livewire.laporan.generator')->setPaper('A4');
        // return $pdf->stream('report.pdf');
        return response()->streamDownload(function () use($pdf) {
            echo  $pdf->stream();
        }, 'report.pdf');
    }
}
