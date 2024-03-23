<?php

namespace App\Http\Livewire\User;
use App\Models\user;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $user = user::paginate(5);
        return view('livewire.user.index',['user' => $user]);
    }
}
