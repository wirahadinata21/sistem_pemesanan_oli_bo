<?php

namespace App\Http\Livewire\Departemen;
use App\Models\tbldepartemen;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public function render()
    {
        $tbldepartemen = tbldepartemen::paginate(5);
        return view('livewire.departemen.index',['tbldepartemen' => $tbldepartemen]);
    }
}
