<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbldepartemen extends Model
{
    protected $table = 'tbldepartemen';
    public $timestamps = true;
    protected $primaryKey = 'iddepartemen';
    public $incrementing = false;
    protected $fillable = ['iddepartemen','deskripsi'];
}
