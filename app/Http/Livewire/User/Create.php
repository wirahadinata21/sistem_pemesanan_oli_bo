<?php

namespace App\Http\Livewire\User;
use App\Models\user;
use App\Models\tblrole;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Create extends Component
{
    public $name;
    public $email;
    public $phone;
    public $location;
    public $idrole;
    public $about;
    public $password;

    public function store()
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
            user::Create([
                'name' => $this->name,
                'email' => $this->email,
                'email_verified_at' => now(),
                'phone' => $this->phone,
                'location' => $this->location,
                'about' => $this->about,
                'idrole' => $this->idrole,
                'password' => Hash::make($this->password),
                'remember_token' => Str::random(10),
            ]);
            
           
    
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Data berhasil diinput.'
            ]);
            return redirect()->route('user.index');

            // $this->resetFields();
            // $this->update = false;
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Gagal!', 
                'text' => 'Input Data Gagal.'
            ]);
        }
    }

    public function render()
    {
        $tblrole = tblrole::pluck('deskripsi', 'idrole');
        return view('livewire.user.create',['tblrole'=>$tblrole]);
    }
}
