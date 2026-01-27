<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('karyawan')->insert([
            [
                'NamaKaryawan'   => 'Fergie',
                'Posisi'         => 'Cutting',
                'Gaji'           => '2000',
                'Status'         => 'Aktif',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'NamaKaryawan'   => 'Herman',
                'Posisi'         => 'Polet',
                'Gaji'           => '1000',
                'Status'         => 'Aktif',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
           
        ]);
    }
}
