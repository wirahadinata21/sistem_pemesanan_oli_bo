<?php

namespace App\Http\Livewire\KonfirmasiSuratJalan;
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
                'statusorder' => "KFMSJ"
            ]);

            tbllogorder::Create([
                'idorder'=> $this->token->idorder,
                'prosesname'=> "KFMSJ",
                'user' => auth()->user()->name
                ]);

            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Konfirmasi berhasil.'
            ]);
            // return redirect()->route('konfirmasi-po.index');
            $vieworderkfmbg = tblorderheader::vieworderkfmbg();
            return view('livewire.konfirmasi-suratjalan.index',compact('vieworderkfmbg'));
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
