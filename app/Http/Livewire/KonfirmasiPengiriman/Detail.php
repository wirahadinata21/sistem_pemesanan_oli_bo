<?php

namespace App\Http\Livewire\KonfirmasiPengiriman;
use App\Models\tblorderheader;
use App\Models\tbllogorder;
use Livewire\Component;

class Detail extends Component
{
    public $tokenheader;
    public $tokendetail;
    public $tokenlogorder;
    public $idorder;
    protected $listeners = ['updatekonfim' => 'update'];

    public function mount($idorder)
    {
        $this->tokenheader = tblorderheader::vieworderbyid($idorder);
        $this->tokendetail = tblorderheader::vieworderdetail($idorder);
        // $this->tokenlogorder = tbllogorder::where('idorder',$idorder)->first();
        // $this->tokenlogorder = tbllogorder::where('idorder',$idorder)->orderBy('created_at', 'desc')->get();
        $this->tokenlogorder = tblorderheader::viewlogorder($idorder);
    }

    public function render()
    {    
        return view('livewire.konfirmasi-pengiriman.detail',
                    ['viewordermskpo' =>$this->tokenheader,
                    'vieworderdetail' =>$this->tokendetail,
                    'tokenlogorder' =>$this->tokenlogorder
                    ]);

    }

    public function update()
    {
        return view('livewire.konfirmasi-pengiriman.index');
    }
    public function deleteProduct()
    {
        $this->isOpen = true;
    }
}