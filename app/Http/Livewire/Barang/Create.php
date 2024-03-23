<?php

namespace App\Http\Livewire\Barang;
use App\Models\tbljenisbarang;
use App\Models\tbljenissatuan;
use App\Models\tblbarang;
use App\Models\mastersequences;
use Livewire\Component;

class Create extends Component
{
    public $namabarang;
    public $idjenisbarang;
    public $idjenissatuan;

    public function store()
    {
        $messages = [
            'namabarang.required' => 'Informasi nama barang harap diisi.',
            'idjenisbarang.required' => 'Informasi jenis barang harap diisi.',
            'idjenissatuan.required' => 'Informasi jenis satuan harap diisi.',
        ];

        $this->validate([
            'namabarang' => 'required',
            'idjenisbarang' => 'required',
            'idjenissatuan' => 'required'
        ], $messages);

        try {
            $ms = mastersequences::find("BG");
            $num=$ms->seqno;
            $jmlh=$num+1;
            $waktu=date('dmy');
            $nounik="BG-".$waktu.-$jmlh;
    
            tblbarang::Create([
                'idbarang'=> $nounik,
                'namabarang'=>$this->namabarang,
                'idjenisbarang'=>$this->idjenisbarang,
                'idsatuan'=>$this->idjenissatuan
                ]);
            
            $ms->seqno = $jmlh;
            $ms->save();
    
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Data berhasil diinput.'
            ]);
            return redirect()->route('barang.index');

            // $this->resetFields();
            // $this->update = false;
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Gagal!', 
                'text' => 'Input Data Gagal.'
            ]);
        }
    }

    public function render()
    {
        $jenisbarang = tbljenisbarang::pluck('deskripsi', 'idjenisbarang');
        $jenissatuan = tbljenissatuan::pluck('deskripsi', 'idsatuan');
        return view('livewire.barang.create',['jenisbarang'=>$jenisbarang,'jenissatuan'=>$jenissatuan]);
    }
}
