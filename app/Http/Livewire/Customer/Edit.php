<?php

namespace App\Http\Livewire\Customer;
use App\Models\tblcustomer;
use App\Models\user;
use App\Models\tblkaryawan;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Edit extends Component
{
    public $token;
    public $idcustomer;
    public $namaperusahaan;
    public $lokasi;
    public $sektor;
    public $pic;
    public $kontak;
    public $email;
    public $password;
    public $idkaryawan;

    public function mount($idcustomer)
    {
        $this->token = tblcustomer::find($idcustomer);
        $this->idcustomer = $this->token->idcustomer;
        $this->namaperusahaan = $this->token->namaperusahaan;
        $this->lokasi = $this->token->lokasi;
        $this->sektor = $this->token->sektor;
        $this->pic = $this->token->pic;
        $this->kontak = $this->token->kontak;
        $this->email = $this->token->email;
        $this->password = $this->token->password;
        $this->idkaryawan = $this->token->idmarketing;
    }

    public function update()
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
            tblcustomer::find($this->token->idcustomer)->update([
                'namaperusahaan' => $this->namaperusahaan,
                'lokasi' => $this->lokasi,
                'sektor' => $this->sektor,
                'pic' => $this->pic,
                'kontak' => $this->kontak,
                'email' => $this->email,
                'password' => $this->password,
                'idmarketing'=>$this->idkaryawan
            ]);
            user::where('email',$this->token->email)->update([
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
                'text' => 'Gagal memperbaharui.'
            ]);
        }
    }

    public function render()
    {    
        $karyawan = tblkaryawan::pluck('namakaryawan', 'idkaryawan');
        return view('livewire.customer.edit',['tblcustomer' =>$this->token,'karyawan'=>$karyawan]);
    }
}
