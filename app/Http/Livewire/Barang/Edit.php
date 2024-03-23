<?php

namespace App\Http\Livewire\Barang;
use App\Models\tblbarang;
use App\Models\tbljenisbarang;
use App\Models\tbljenissatuan;
use Livewire\Component;

class Edit extends Component
{
    public $token;
    public $idbarang;
    public $namabarang;
    public $idjenisbarang;
    public $idjenissatuan;

    public function mount($idbarang)
    {
        $this->token = tblbarang::find($idbarang);
        $this->idbarang = $this->token->idbarang;
        $this->namabarang = $this->token->namabarang;
        $this->idjenisbarang = $this->token->idjenisbarang;
        $this->idsatuan = $this->token->idjenissatuan;
    }

    public function update()
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
            tblbarang::find($this->token->idbarang)->update([
                'namabarang'=>$this->namabarang,
                'idjenisbarang'=>$this->idjenisbarang,
                'idsatuan'=>$this->idjenissatuan
            ]);
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Barang berhasil diperbaharui.'
            ]);
            return redirect()->route('barang.index');

            // $this->resetFields();
            // $this->update = false;
        } catch (\Exception $ex) {
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',  
                'message' => 'Gagal!', 
                'text' => 'Gagal memperbaharui.'
            ]);
        }
    }

    public function render()
    {    
        $jenisbarang = tbljenisbarang::pluck('deskripsi', 'idjenisbarang');
        $jenissatuan = tbljenissatuan::pluck('deskripsi', 'idsatuan');
        return view('livewire.barang.edit',['tblbarang' =>$this->token,'jenisbarang'=>$jenisbarang,'jenissatuan'=>$jenissatuan]);
    }
}
