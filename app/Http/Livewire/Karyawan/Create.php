<?php

namespace App\Http\Livewire\Karyawan;
use App\Models\tbldepartemen;
use App\Models\tblkaryawan;
use App\Models\mastersequences;
use Livewire\Component;

class Create extends Component
{
    public $nik;
    public $namakaryawan;
    public $iddepartemen;

    public function store()
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
            $ms = mastersequences::find("KN");
            $num=$ms->seqno;
            $jmlh=$num+1;
            $waktu=date('dmy');
            $nounik="KN-".$waktu.-$jmlh;
    
            tblkaryawan::Create([
                'idkaryawan'=> $nounik,
                'nik'=>$this->nik,
                'namakaryawan'=>$this->namakaryawan,
                'iddepartemen'=>$this->iddepartemen
                ]);
            
            $ms->seqno = $jmlh;
            $ms->save();
    
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Data berhasil diinput.'
            ]);
            return redirect()->route('karyawan.index');

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
        $departemen = tbldepartemen::pluck('deskripsi', 'iddepartemen');
        return view('livewire.karyawan.create',['departemen'=>$departemen]);
    }
}
