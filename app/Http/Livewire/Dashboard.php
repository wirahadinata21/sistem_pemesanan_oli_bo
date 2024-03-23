<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use App\Models\tblorderheader;
use App\Models\tblcustomer;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // $totalkomisi = DB::table('tblorderheader AS ta')
        //         ->select('sum(komisi)')
        //         // ->groupby()
        //         ->pluck('komisi');
                // $totalkomisi = select(DB::raw("SUM(komisi) as komisi"));
        $totalkomisi = tblorderheader::sum('komisi');
        $totalpo = tblorderheader::count('idorder');
        $totalcust = tblcustomer::count('idcustomer');
        $totalnilaipo = tblorderheader::sum('nilaipo');

        return view('livewire.dashboard',
        ['totalkomisi' => $totalkomisi,
        'totalpo' => $totalpo,
        'totalcust' => $totalcust,
        'totalnilaipo' => $totalnilaipo]);
    }
}
