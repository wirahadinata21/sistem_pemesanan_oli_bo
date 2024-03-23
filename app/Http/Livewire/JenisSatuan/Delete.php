<?php

namespace App\Http\Livewire\JenisSatuan;
use App\Models\tbljenissatuan;
use Livewire\Component;

class Delete extends Component
{
    public $token;

    public function mount($idsatuan)
    {
        try{
            $this->token = tbljenissatuan::find($idsatuan);
            tbljenissatuan::find($this->token->idsatuan)->delete();
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Berhasil menghapus data.'
            ]);
            return redirect()->route('jenis-satuan.index');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Gagal!', 
                'text' => 'Gagal menghapus data.'
            ]);
        }
    }
}
