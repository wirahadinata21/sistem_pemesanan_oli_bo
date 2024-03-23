<?php

namespace App\Http\Livewire\Karyawan;
use App\Models\tblkaryawan;
use Livewire\Component;

class Delete extends Component
{
    public $token;

    public function mount($idkaryawan)
    {
        try{
            $this->token = tblkaryawan::find($idkaryawan);
            tblkaryawan::find($this->token->idkaryawan)->delete();
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Berhasil menghapus data.'
            ]);
            return redirect()->route('departemen.index');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Gagal!', 
                'text' => 'Gagal menghapus data.'
            ]);
        }
    }

}