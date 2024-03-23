<?php

namespace App\Http\Livewire\Barang;
use App\Models\tblbarang;
use Livewire\Component;

class Detail extends Component
{
    public $token;

    public function mount($idbarang)
    {
        $this->token = tblbarang::viewbarangbyid($idbarang);
    }

    public function render()
    {    
        return view('livewire.barang.detail',['tblbarang' =>$this->token]);
    }
}
