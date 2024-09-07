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
        Schema::create('peminat', function (Blueprint $table) {
            $table->bigIncrements('no_reg'); // Use bigIncrements to specify a custom name
            $table->enum('gelombang', ['1','2','3','4']);
            $table->string('nama')->length(50);
            $table->bigInteger('nisn');
            $table->bigInteger('nik');
            $table->string('asal_sekolah')->length(50);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Buddha', 'Hindu', 'Konghucu']);
            $table->string('tempat_lahir')->length(100);
            $table->date('tgl_lahir');
            $table->string('no_wa_siswa')->length(12);
            $table->enum('jalur_masuk', ['Rapor', 'Prestasi Akademis', 'Non Akademis', 'Tahfidz', 'Minat Bakat']);
            $table->enum('jurusan_1', ['TKJT', 'RPL', 'DKV', 'Animasi']);
            $table->enum('jurusan_2', ['TKJT', 'RPL', 'DKV', 'Animasi']);
            $table->enum('status', ['Peminat', 'Pendaftar', 'Daftar Ulang']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminat');
    }
};
