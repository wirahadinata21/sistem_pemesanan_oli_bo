<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbljenisbarang extends Model
{
    protected $table = 'tbljenisbarang';
    public $timestamps = true;
    protected $primaryKey = 'idjenisbarang';
    public $incrementing = false;
    protected $fillable = ['idjenisbarang','deskripsi'];
}
