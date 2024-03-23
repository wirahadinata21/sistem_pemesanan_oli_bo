<?php

namespace App\Http\Livewire\Role;
use App\Models\tblrole;
use Livewire\Component;

class Edit extends Component
{
    public $token;
    public $idrole;

    public function mount($idrole)
    {
        $this->token = tblrole::find($idrole);
        $this->idrole = $this->token->idrole;
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
            tblrole::find($this->token->idrole)->update([
                'deskripsi' => $this->deskripsi
            ]);
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Role berhasil diperbaharui.'
            ]);
            return redirect()->route('role.index');

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
        return view('livewire.role.edit',['tblrole' =>$this->token]);
    }
}
