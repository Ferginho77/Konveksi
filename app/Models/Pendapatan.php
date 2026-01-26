<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    protected $table = 'pendapatan';

    protected $fillable =
    [
    'IdKaryawan',
    'Jumlah',
    'Tanggal',
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'IdKaryawan', 'IdKaryawan');
    }
}
