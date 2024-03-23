<?php

namespace App\Http\Livewire\Customer;
use App\Models\tblcustomer;
use App\Models\mastersequences;
use App\Models\user;
use App\Models\tblkaryawan;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Create extends Component
{
    public $idcustomer;
    public $namaperusahaan;
    public $lokasi;
    public $sektor;
    public $pic;
    public $kontak;
    public $email;
    public $password;
    public $idkaryawan;

    public function store()
    {
        $messages = [
            'namaperusahaan.required' => 'Informasi nama perusahaan harap diisi.',
            'lokasi.required' => 'Informasi lokasi harap diisi.',
            'sektor.required' => 'Informasi sektor harap diisi.',
            'pic.required' => 'Informasi pic harap diisi.',
            'kontak.required' => 'Informasi kontak harap diisi.',
            'email.required' => 'Informasi email harap diisi.',
            'password.required' => 'Informasi password harap diisi.',
            'idkaryawan.required' => 'Informasi karyawan harap diisi.'
        ];

        $this->validate([
            'namaperusahaan' => 'required',
            'lokasi' => 'required',
            'sektor' => 'required',
            'pic' => 'required',
            'kontak' => 'required',
            'email' => 'required',
            'password' => 'required',
            'idkaryawan' => 'required'
        ], $messages);
        try {
            $ms = mastersequences::find("CT");
            $num=$ms->seqno;
            $jmlh=$num+1;
            $waktu=date('dmy');
            $nounik="CT-".$waktu.-$jmlh;
    
            tblcustomer::Create([
                'idcustomer'=> $nounik,
                'namaperusahaan'=>$this->namaperusahaan,
                'lokasi'=>$this->lokasi,
                'sektor'=>$this->sektor,
                'pic'=>$this->pic,
                'kontak'=>$this->kontak,
                'email'=>$this->email,
                'password'=>$this->password,
                'idmarketing'=>$this->idkaryawan
                ]);
            
            $ms->seqno = $jmlh;
            $ms->save();

            user::Create([
                'name' => $this->namaperusahaan,
                'email' => $this->email,
                'email_verified_at' => now(),
                'phone' => $this->kontak,
                'location' => $this->lokasi,
                'about' => 'Login Customer Oli',
                'idrole' => 'Customer',
                'password' => Hash::make($this->password),
                'remember_token' => Str::random(10),
            ]);
    
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'success',  
                'message' => 'Berhasil!', 
                'text' => 'Customer berhasil diperbaharui.'
            ]);
            return redirect()->route('customer.index');

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
        $karyawan = tblkaryawan::pluck('namakaryawan', 'idkaryawan');
        return view('livewire.customer.create',['karyawan'=>$karyawan]);
    }

}
