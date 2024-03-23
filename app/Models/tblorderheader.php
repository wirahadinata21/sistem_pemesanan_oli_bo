<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tblorderheader extends Model
{
    protected $table = 'tblorderheader';
    public $timestamps = true;
    protected $primaryKey = 'idorder';
    public $incrementing = false;
    protected $fillable = ['idorder','tgltransaksi','idcustomer','tglpo','nomorpo','lampiranpo','statusorder','idmarketing','komisi','nilaipo'];

    public static function vieworder(){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                // ->where("c.statusorder","MSKPO")
                ->paginate(5);
    }

    public static function viewordermskpo(){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                ->where("c.statusorder","MSKPO")
                ->paginate(5);
    }
    public static function viewordercancel(){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                ->where("c.statusorder","CANCL")
                ->paginate(5);
    }

    public static function vieworderkfmpo(){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                ->where("c.statusorder","KFMPO")
                ->paginate(5);
    }

    public static function vieworderkfmbg(){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                ->where("c.statusorder","KFMBG")
                ->paginate(5);
    }

    public static function vieworderkfmsj(){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                ->where("c.statusorder","KFMSJ")
                ->paginate(5);
    }

    public static function viewordercmplt(){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                ->where("c.statusorder","CMPLT")
                ->paginate(5);
    }
    
    public static function vieworderbyid($idorder){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                ->where('c.idorder',$idorder)
                ->get();
    }

    public static function vieworderdetail($idorder){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer','tblbarang.*','tblorderdetail.*', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                ->where('c.idorder',$idorder)
                ->get();
    }
    public static function viewlogorder($idorder){
        return DB::table('tbllogorder as c')
                ->leftJoin('tblstatusorder', 'c.prosesname', '=', 'tblstatusorder.idstatusorder')
                ->select('tblstatusorder.deskripsi as namastatus', 'c.*')
                ->where('c.idorder',$idorder)
                ->orderBy('created_at', 'desc')
                ->get();
    }

    public static function vieworderbycust($idcustomer){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                ->where('c.idcustomer',$idcustomer)
                ->get();
    }

    public static function vieworderall(){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                // ->where("c.statusorder","MSKPO")
                ->get();
    }

    public static function vieworderbydate($tglawal,$tglakhir){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                ->whereBetween('c.tgltransaksi', [$tglawal, $tglakhir])
                ->get();
    }

    public static function vieworderbydate2($tglawal,$tglakhir){
        return DB::table('tblorderheader as c')
                ->leftJoin('tblcustomer', 'c.idcustomer', '=', 'tblcustomer.idcustomer')
                // ->leftJoin('tblorderdetail', 'c.idorder', '=', 'tblorderdetail.idorder')
                // ->leftJoin('tblbarang', 'tblorderdetail.idbarang', '=', 'tblbarang.idbarang')
                ->leftJoin('tblstatusorder', 'c.statusorder', '=', 'tblstatusorder.idstatusorder')
                ->leftJoin('tblkaryawan', 'c.idmarketing', '=', 'tblkaryawan.idkaryawan')
                ->select('tblcustomer.namaperusahaan as namacustomer', 'c.*','tblstatusorder.deskripsi as namastatus','tblstatusorder.persentase','tblkaryawan.namakaryawan')
                ->whereBetween('c.tgltransaksi', [$tglawal, $tglakhir])
                ->get()
                ->toArray();
    }
}
