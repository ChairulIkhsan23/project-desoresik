<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArmadasTable extends Migration
{
    public function up(): void
    {
        Schema::create('armada', function (Blueprint $table) {
            $table->id();
            $table->string('nama');                  // Kolom: Nama
            $table->string('nomor_polisi')->unique(); // Kolom: No Polisi
            $table->year('tahun_kendaraan');         // Kolom: Tahun Kendaraan
            $table->string('jenis');                 // Kolom: Jenis
            $table->string('foto')->nullable();      // Kolom: Foto
            $table->timestamps();                    // created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('armadas');
    }
}
