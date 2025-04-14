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
        Schema::create('laporan_pengangkutan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_id')->constrained('jadwal_pengangkutan')->onDelete('cascade');
            $table->enum('status_laporan', ['selesai', 'proses', 'gagal']);
            $table->string('foto')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamp('waktu_lapor');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pengangkutan');
    }
};
