<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('IdKaryawan');
            $table->string('NamaKaryawan');
            $table->enum('Posisi', ['Cutting', 'Polet', 'Seleting', 'Renda', 'Obras', 'Packing']);
            $table->string('Gaji');
            $table->enum('Status', ['Aktif', 'NonAktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawan');
    }
};
