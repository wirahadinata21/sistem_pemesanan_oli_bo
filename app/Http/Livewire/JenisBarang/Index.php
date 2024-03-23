<?php

namespace App\Http\Livewire\JenisBarang;
use App\Models\tbljenisbarang;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public function render()
    {
        $tbljenisbarang = tbljenisbarang::paginate(5);
        return view('livewire.jenis-barang.index',['tbljenisbarang' => $tbljenisbarang]);
    }
}
