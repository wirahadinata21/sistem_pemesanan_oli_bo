<?php

namespace App\Http\Livewire\Customer;
use App\Models\tblcustomer;
use Livewire\Component;

class Detail extends Component
{
    public $token;

    public function mount($idcustomer)
    {
        $this->token = tblcustomer::find($idcustomer);
    }

    public function render()
    {    
        return view('livewire.customer.detail',['tblcustomer' =>$this->token]);
    }
}
