<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbljenissatuan extends Model
{
    protected $table = 'tbljenissatuan';
    public $timestamps = true;
    protected $primaryKey = 'idsatuan';
    public $incrementing = false;
    protected $fillable = ['idsatuan','deskripsi'];
}
