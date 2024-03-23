<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbllogorder extends Model
{
    protected $table = 'tbllogorder';
    public $timestamps = true;
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['idorder','prosesname','user'];
}
