<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tblkaryawan extends Model
{
    protected $table = 'tblkaryawan';
    public $timestamps = true;
    protected $primaryKey = 'idkaryawan';
    public $incrementing = false;
    protected $fillable = ['idkaryawan','nik','namakaryawan','iddepartemen'];

    public static function viewkaryawan(){
        return DB::table('tblkaryawan as c')
                ->leftJoin('tbldepartemen', 'c.iddepartemen', '=', 'tbldepartemen.iddepartemen')
                ->select('tbldepartemen.deskripsi as namadepartemen', 'c.*')
                // ->get();
                ->paginate(3);
    }
    public static function viewkaryawanbyid($idkaryawan){
        return DB::table('tblkaryawan as c')
                ->leftJoin('tbldepartemen', 'c.iddepartemen', '=', 'tbldepartemen.iddepartemen')
                ->select('tbldepartemen.deskripsi as namadepartemen', 'c.*')
                ->where("c.idkaryawan",$idkaryawan)
                ->get();
    }
}
