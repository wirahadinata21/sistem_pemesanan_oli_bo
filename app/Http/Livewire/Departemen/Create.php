<?php

namespace App\Http\Livewire\Departemen;
use App\Models\tbldepartemen;
use App\Models\mastersequences;
use Livewire\Component;

class Create extends Component
{
    public $deskripsi;
    
    // protected $rules = [
    //     'deskripsi' => 'required'
    // ];

    public function store()
    {
        $messages = [
            'deskripsi.required' => 'Informasi deskripsi harap diisi.',
            'deskripsi.max' => 'Panjang deskripsi hanya 20 karakter.'
        ];

        $this->validate([
            'deskripsi' => 'required|max:20'
        ], $messages);

        try {
            $ms = mastersequences::find("DP");
            $num=$ms->seqno;
            $jmlh=$num+1;
            $waktu=date('dmy');
            $nounik="DP-".$waktu.-$jmlh;
    
            tbldepartemen::Create([
                'iddepartemen'=> $nounik,
                'deskripsi'=>$this->deskripsi
                ]);
            
            $ms->seqno = $jmlh;
            $ms->save();
    
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Departemen berhasil diperbaharui.'
            ]);
            return redirect()->route('departemen.index');

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
    // Pt senso oil lestari
    public function render()
    {
        return view('livewire.departemen.create');
    }

    public function alertSuccess()
    {
        $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Jenis barang berhasil ditambahkan.'
            ]);
    }

    public function alertConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',  
                'message' => 'Are you sure?', 
                'text' => 'If deleted, you will not be able to recover this imaginary file!'
            ]);
    }
    public function remove()
    {
        /* Write Delete Logic */
        $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'User Delete Successfully!', 
                'text' => 'It will not list on users table soon.'
            ]);
    }
}
