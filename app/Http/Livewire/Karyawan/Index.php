<?php

namespace App\Http\Livewire\Karyawan;
use App\Models\tblkaryawan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public function render()
    {
        $tblkaryawan = tblkaryawan::viewkaryawan();
        return view('livewire.karyawan.index',['tblkaryawan' => $tblkaryawan]);
    }
}

