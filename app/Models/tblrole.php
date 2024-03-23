<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblrole extends Model
{
    protected $table = 'tblrole';
    public $timestamps = true;
    protected $primaryKey = 'idrole';
    public $incrementing = false;
    protected $fillable = ['idrole','deskripsi'];
}
