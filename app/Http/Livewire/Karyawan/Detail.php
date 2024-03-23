<?php

namespace App\Http\Livewire\Karyawan;
use App\Models\tblkaryawan;
use Livewire\Component;

class Detail extends Component
{
    public $token;

    public function mount($idkaryawan)
    {
        $this->token = tblkaryawan::viewkaryawanbyid($idkaryawan);
    }

    public function render()
    {    
        return view('livewire.karyawan.detail',['tblkaryawan' =>$this->token]);
    }
}
