<?php

namespace App\Http\Livewire\JenisBarang;
use App\Models\tbljenisbarang;
use Livewire\Component;

class Detail extends Component
{
    public $token;

    public function mount($idjenisbarang)
    {
        $this->token = tbljenisbarang::find($idjenisbarang);
    }

    public function render()
    {    
        return view('livewire.jenis-barang.detail',['tbljenisbarang' =>$this->token]);
    }
}
