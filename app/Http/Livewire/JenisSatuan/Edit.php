<?php

namespace App\Http\Livewire\JenisSatuan;
use App\Models\tbljenissatuan;
use Livewire\Component;

class Edit extends Component
{
    public $token;
    public $idsatuan;

    public function mount($idsatuan)
    {
        $this->token = tbljenissatuan::find($idsatuan);
        $this->idsatuan = $this->token->idsatuan;
        $this->deskripsi = $this->token->deskripsi;
    }

    public function update()
    {
        $messages = [
            'deskripsi.required' => 'Informasi deskripsi harap diisi.',
            'deskripsi.max' => 'Panjang deskripsi hanya 20 karakter.'
        ];

        $this->validate([
            'deskripsi' => 'required|max:20'
        ], $messages);
        try {
            tbljenissatuan::find($this->token->idsatuan)->update([
                'deskripsi' => $this->deskripsi
            ]);
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Jenis satuan berhasil diperbaharui.'
            ]);
            return redirect()->route('jenis-satuan.index');

            // $this->resetFields();
            // $this->update = false;
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Gagal!', 
                'text' => 'Gagal memperbaharui.'
            ]);
        }
    }

    public function render()
    {    
        return view('livewire.jenis-satuan.edit',['tbljenissatuan' =>$this->token]);
    }
}
