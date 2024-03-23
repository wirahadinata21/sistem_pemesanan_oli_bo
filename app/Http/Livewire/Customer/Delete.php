<?php

namespace App\Http\Livewire\Customer;
use App\Models\tblcustomer;
use App\Models\user;
use Livewire\Component;

class Delete extends Component
{
    public $token;

    public function mount($idcustomer)
    {
        try{
            $this->token = tblcustomer::find($idcustomer);
            tblcustomer::find($this->token->idcustomer)->delete();
            user::where('email',$this->token->email)->delete();
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Berhasil menghapus data.'
            ]);
            return redirect()->route('customer.index');
        }catch(\Exception $e){
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Gagal!', 
                'text' => 'Gagal menghapus data.'
            ]);
        }
    }
}
