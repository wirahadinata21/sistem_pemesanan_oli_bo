<?php

namespace App\Http\Livewire\Role;
use App\Models\tblrole;
use Livewire\Component;

class Delete extends Component
{
    public $token;

    public function mount($idrole)
    {
        try{
            $this->token = tblrole::find($idrole);
            tblrole::find($this->token->idrole)->delete();
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Berhasil menghapus data.'
            ]);
            return redirect()->route('role.index');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Gagal!', 
                'text' => 'Gagal menghapus data.'
            ]);
        }
    }

}
