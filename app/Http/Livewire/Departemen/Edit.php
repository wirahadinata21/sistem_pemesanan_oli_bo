<?php

namespace App\Http\Livewire\Departemen;
use App\Models\tbldepartemen;
use Livewire\Component;

class Edit extends Component
{
    public $token;
    public $iddepartemen;

    public function mount($iddepartemen)
    {
        $this->token = tbldepartemen::find($iddepartemen);
        $this->iddepartemen = $this->token->iddepartemen;
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
            tbldepartemen::find($this->token->iddepartemen)->update([
                'deskripsi' => $this->deskripsi
            ]);
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Departemen berhasil diperbaharui.'
            ]);
            return redirect()->route('departemen.index');

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
        return view('livewire.departemen.edit',['tbldepartemen' =>$this->token]);
    }
}
