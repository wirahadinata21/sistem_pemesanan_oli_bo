<?php

namespace App\Http\Livewire\Barang;
use App\Models\tblbarang;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public function render()
    {
        $tblbarang = tblbarang::viewbarang();
        return view('livewire.barang.index',['tblbarang' => $tblbarang]);
    }
}
