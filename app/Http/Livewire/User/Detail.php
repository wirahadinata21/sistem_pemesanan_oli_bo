<?php

namespace App\Http\Livewire\User;
use App\Models\user;
use Livewire\Component;

class Detail extends Component
{
    public $token;

    public function mount($id)
    {
        $this->token = user::find($id);
    }

    public function render()
    {    
        return view('livewire.user.detail',['user' =>$this->token]);
    }
}
