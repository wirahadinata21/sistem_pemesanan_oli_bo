<?php

namespace App\Http\Livewire\JenisBarang;
use App\Models\tbljenisbarang;
use Livewire\Component;

class Edit extends Component
{
    public $token;
    public $idjenisbarang;

    public function mount($idjenisbarang)
    {
        $this->token = tbljenisbarang::find($idjenisbarang);
        $this->idjenisbarang = $this->token->idjenisbarang;
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
            tbljenisbarang::find($this->token->idjenisbarang)->update([
                'deskripsi' => $this->deskripsi
            ]);
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Jenis barang berhasil diperbaharui.'
            ]);
            return redirect()->route('jenis-barang.index');

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
        return view('livewire.jenis-barang.edit',['tbljenisbarang' =>$this->token]);
    }
}
