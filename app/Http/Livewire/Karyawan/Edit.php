<?php

namespace App\Http\Livewire\Karyawan;
use App\Models\tblkaryawan;
use App\Models\tbldepartemen;
use Livewire\Component;

class Edit extends Component
{
    public $token;
    public $idkaryawan;
    public $nik;
    public $namakaryawan;
    public $iddepartemen;

    public function mount($idkaryawan)
    {
        $this->token = tblkaryawan::find($idkaryawan);
        $this->idkaryawan = $this->token->idkaryawan;
        $this->nik = $this->token->nik;
        $this->namakaryawan = $this->token->namakaryawan;
        $this->iddepartemen = $this->token->iddepartemen;
    }

    public function update()
    {
        $messages = [
            'nik.required' => 'Informasi nik harap diisi.',
            'namakaryawan.required' => 'Informasi nama karyawan harap diisi.',
            'iddepartemen.required' => 'Informasi departemen harap diisi.',
        ];

        $this->validate([
            'nik' => 'required',
            'namakaryawan' => 'required',
            'iddepartemen' => 'required'
        ], $messages);

        try {
            tblkaryawan::find($this->token->idkaryawan)->update([
                'nik'=>$this->nik,
                'namakaryawan'=>$this->namakaryawan,
                'iddepartemen'=>$this->iddepartemen
            ]);
            
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Karyawan berhasil diperbaharui.'
            ]);
            return redirect()->route('karyawan.index');

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
        $departemen = tbldepartemen::pluck('deskripsi', 'iddepartemen');
        return view('livewire.karyawan.edit',['tblkaryawan' =>$this->token,'departemen'=>$departemen]);
    }
}
