<?php

namespace App\Http\Livewire\Departemen;
use App\Models\tbldepartemen;
use Livewire\Component;

class Detail extends Component
{
    public $token;

    public function mount($iddepartemen)
    {
        $this->token = tbldepartemen::find($iddepartemen);
    }

    public function render()
    {    
        return view('livewire.departemen.detail',['tbldepartemen' =>$this->token]);
    }
}
