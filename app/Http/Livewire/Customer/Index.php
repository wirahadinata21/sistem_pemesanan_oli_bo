<?php

namespace App\Http\Livewire\Customer;
use App\Models\tblcustomer;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public function render()
    {
        $tblcustomer = tblcustomer::paginate(5);
        return view('livewire.customer.index',['tblcustomer' => $tblcustomer]);
    }
}
