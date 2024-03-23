<?php

namespace App\Http\Livewire\JenisBarang;
use App\Models\tbljenisbarang;
use Livewire\Component;

class Delete extends Component
{
    public $token;

    public function mount($idjenisbarang)
    {
        try{
            $this->token = tbljenisbarang::find($idjenisbarang);
            tbljenisbarang::find($this->token->idjenisbarang)->delete();
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Berhasil menghapus data.'
            ]);
            return redirect()->route('jenis-barang.index');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Gagal!', 
                'text' => 'Gagal menghapus data.'
            ]);
        }
    }

}
