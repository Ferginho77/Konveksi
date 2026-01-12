<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
     protected $table = 'karyawan';
    protected $primaryKey = 'IdKaryawan';
    public $incrementing = true;
    protected $keyType = 'int';
    protected $fillable = 
    ['NamaKaryawan', 
    'Posisi', 
    'Gaji', 
    'Status'];
}
