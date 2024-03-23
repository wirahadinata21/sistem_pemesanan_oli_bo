<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tblstatusorder extends Model
{
    protected $table = 'tblstatusorder';
    public $timestamps = true;
    protected $primaryKey = 'idstatusorder';
    public $incrementing = false;
    
}
