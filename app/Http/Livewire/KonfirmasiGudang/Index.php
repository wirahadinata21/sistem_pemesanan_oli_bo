<?php

namespace App\Http\Livewire\KonfirmasiGudang;
use App\Models\tblorderheader;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $vieworderkfmpo = tblorderheader::vieworderkfmpo();
        return view('livewire.konfirmasi-gudang.index',compact('vieworderkfmpo'));
    }
}

// MSKPO = PO Masuk dari Customer --muncul di menu konfirmasi PO dan inquiry
// CANCL = Cancel  --muncul di menu inquiry
// KFMPO = Konfirmasi PO dari Adm --muncul di menu konfirmasi admin dan inquiry
// KFMBG = Konfirmasi barang tersedia dari bagian gudang
// KFMSJ = Konfrimasi surat jalan dari marketing
// CMPLT = Complete, barang diterima customer
