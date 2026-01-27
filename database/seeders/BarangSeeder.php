<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
         DB::table('barang')->insert([
            [
                'NamaBarang'   => 'Seleting',
                'Stok'         => '50',
                'Deskripsi'           => 'Satuan Pcs',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'NamaBarang'   => 'Kawat',
                'Stok'         => '50',
                'Deskripsi'           => 'Satuan Pcs',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'NamaBarang'   => 'Kain Tileu',
                'Stok'         => '50',
                'Deskripsi'           => 'Satuan Meter',
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
           
        ]);
    }
}
