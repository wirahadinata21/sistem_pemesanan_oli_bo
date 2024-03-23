<?php

namespace App\Http\Livewire\KonfirmasiPo;
use App\Models\tblorderheader;
use Livewire\Component;

class Edit extends Component
{
    public $token;

    public function mount($idorder)
    {
        try {
            tblorderheader::find($this->token->idorder)->update([
                'statusorder' => "KFMPO"
            ]);
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Konfirmasi berhasil.'
            ]);
            return redirect()->route('konfirmasi-po.index');

            // $this->resetFields();
            // $this->update = false;
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Gagal!', 
                'text' => 'Gagal konfirmasi.'
            ]);
        }
    }
}
