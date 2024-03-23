<?php

namespace App\Http\Livewire\KonfirmasiPengiriman;
use App\Models\tblorderheader;
use App\Models\tbllogorder;
use App\Models\user;
use Livewire\Component;

class Delete extends Component
{
    public $token;

    public function mount($idorder)
    {
        $this->token = tblorderheader::find($idorder);
    }
    public function render()
    {
        try {
            tblorderheader::find($this->token->idorder)->update([
                'statusorder' => "CMPLT"
            ]);

            tbllogorder::Create([
                'idorder'=> $this->token->idorder,
                'prosesname'=> "CMPLT",
                'user' => auth()->user()->name
                ]);

            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Konfirmasi berhasil.'
            ]);
            // return redirect()->route('konfirmasi-po.index');
            $vieworderkfmsj = tblorderheader::vieworderkfmsj();
            return view('livewire.konfirmasi-pengiriman.index',compact('vieworderkfmsj'));
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
