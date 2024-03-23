<?php

namespace App\Http\Livewire\JenisSatuan;
use App\Models\tbljenissatuan;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    // protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteJenisSatuan'];

    public function deleteJenisSatuan($id)
    {
        tbljenissatuan::find($id)->delete();

        session()->flash('message', 'Jenis Satuan Berhasil Dihapus..');
    }

    public function render()
    {
        $tbljenissatuan = tbljenissatuan::paginate(5);
        return view('livewire.jenis-satuan.index',['tbljenissatuan' => $tbljenissatuan]);
    }

}
