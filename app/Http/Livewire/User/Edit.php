<?php

namespace App\Http\Livewire\User;
use App\Models\user;
use App\Models\tblrole;
use Livewire\Component;
use Illuminate\Support\Str;

class Edit extends Component
{
    public $token;
    public $iduser;
    public $name;
    public $email;
    public $phone;
    public $location;
    public $idrole;
    public $about;
  

    public function mount($id)
    {
        $this->token = user::find($id);
        $this->iduser = $this->token->iduser;
        $this->name = $this->token->name;
        $this->email = $this->token->email;
        $this->phone = $this->token->phone;
        $this->location = $this->token->location;
        $this->idrole = $this->token->idrole;
        $this->about = $this->token->about;
    }

    public function update()
    {
        $messages = [
            'name.required' => 'Informasi nama user harap diisi.',
            'email.required' => 'Informasi email harap diisi.',
            'phone.required' => 'Informasi phone harap diisi.',
            'location.required' => 'Informasi location harap diisi.',
            'idrole.required' => 'Informasi role harap diisi.',
            'about.required' => 'Informasi about harap diisi.'
        ];

        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'idrole' => 'required',
            'about' => 'required'
        ], $messages);

        try {
            
            user::find($this->token->iduser)->update([
                'name' => $this->name,
                'email' => $this->email,
                'email_verified_at' => now(),
                'phone' => $this->phone,
                'location' => $this->location,
                'about' => $this->about,
                'idrole' => $this->idrole
            ]);

            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'User berhasil diperbaharui.'
            ]);
            return redirect()->route('user.index');

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
        $tblrole = tblrole::pluck('deskripsi', 'idrole');
        return view('livewire.user.edit',['user' =>$this->token,'tblrole'=>$tblrole]);
    }
}
