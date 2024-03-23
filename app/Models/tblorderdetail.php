<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class tblorderdetail extends Model
{
    use HasFactory;
    protected $table = 'tblorderdetail';
    public $timestamps = true;
    protected $primaryKey = 'idorder';
    public $incrementing = false;
    protected $fillable = ['idorder','idbarang','jumlah'];

}
