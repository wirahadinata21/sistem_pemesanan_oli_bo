<?php

namespace App\Http\Livewire\Barang;
use App\Models\tblbarang;
use Livewire\Component;

class Delete extends Component
{
    public $token;

    public function mount($idbarang)
    {
        try{
            $this->token = tblbarang::find($idbarang);
            tblbarang::find($this->token->idbarang)->delete();
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Berhasil menghapus data.'
            ]);
            return redirect()->route('barang.index');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Gagal!', 
                'text' => 'Gagal menghapus data.'
            ]);
        }
    }

}

