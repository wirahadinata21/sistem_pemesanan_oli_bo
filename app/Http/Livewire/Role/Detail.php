<?php

namespace App\Http\Livewire\Role;
use App\Models\tblrole;
use Livewire\Component;

class Detail extends Component
{
    public $token;

    public function mount($idrole)
    {
        $this->token = tblrole::find($idrole);
    }

    public function render()
    {    
        return view('livewire.role.detail',['tblrole' =>$this->token]);
    }
}
