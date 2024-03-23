<?php

namespace App\Http\Livewire\Role;
use App\Models\tblrole;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public function render()
    {
        $tblrole = tblrole::paginate(5);
        return view('livewire.role.index',['tblrole' => $tblrole]);
    }
}
