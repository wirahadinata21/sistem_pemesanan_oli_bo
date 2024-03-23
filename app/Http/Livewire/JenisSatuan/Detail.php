<?php

namespace App\Http\Livewire\JenisSatuan;
use App\Models\tbljenissatuan;
use Livewire\Component;

class Detail extends Component
{
    public $token;

    public function mount($idsatuan)
    {
        $this->token = tbljenissatuan::find($idsatuan);
    }

    public function render()
    {    
        return view('livewire.jenis-satuan.detail',['tbljenissatuan' =>$this->token]);
    }
}
