<?php

namespace App\Http\Livewire\KonfirmasiPengiriman;
use App\Models\tblorderheader;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $vieworderkfmsj = tblorderheader::vieworderkfmsj();
        return view('livewire.konfirmasi-pengiriman.index',compact('vieworderkfmsj'));
    }
}

// MSKPO = PO Masuk dari Customer --muncul di menu konfirmasi PO dan inquiry
// CANCL = Cancel  --muncul di menu inquiry
// KFMPO = Konfirmasi PO dari Adm --muncul di menu konfirmasi admin dan inquiry
// KFMBG = Konfirmasi barang tersedia dari bagian gudang
// KFMSJ = Konfrimasi surat jalan dari marketing
// CMPLT = Complete, barang diterima customer
