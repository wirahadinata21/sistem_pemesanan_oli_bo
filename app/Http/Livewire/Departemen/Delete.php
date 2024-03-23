<?php

namespace App\Http\Livewire\Departemen;
use App\Models\tbldepartemen;
use Livewire\Component;

class Delete extends Component
{
    public $token;

    public function mount($iddepartemen)
    {
        try{
            $this->token = tbldepartemen::find($iddepartemen);
            tbldepartemen::find($this->token->iddepartemen)->delete();
            
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
