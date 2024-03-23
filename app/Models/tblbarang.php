<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tblbarang extends Model
{
    protected $table = 'tblbarang';
    public $timestamps = true;
    protected $primaryKey = 'idbarang';
    public $incrementing = false;
    protected $fillable = ['idbarang','namabarang','idjenisbarang','idsatuan'];

    public static function viewbarang(){
        return DB::table('tblbarang as c')
                ->leftJoin('tbljenissatuan', 'c.idsatuan', '=', 'tbljenissatuan.idsatuan')
                ->leftJoin('tbljenisbarang', 'c.idjenisbarang', '=', 'tbljenisbarang.idjenisbarang')
                ->select('tbljenissatuan.deskripsi as deskripsisatuan','tbljenisbarang.deskripsi as deskripsijenisbarang', 'c.*')
                // ->get();
                ->paginate(3);
    }
    public static function viewbarangbyid($idbarang){
        return DB::table('tblbarang as c')
        ->leftJoin('tbljenissatuan', 'c.idsatuan', '=', 'tbljenissatuan.idsatuan')
        ->leftJoin('tbljenisbarang', 'c.idjenisbarang', '=', 'tbljenisbarang.idjenisbarang')
        ->select('tbljenissatuan.deskripsi as deskripsisatuan','tbljenisbarang.deskripsi as deskripsijenisbarang', 'c.*')
                ->where("c.idbarang",$idbarang)
                ->get();
    }
}
