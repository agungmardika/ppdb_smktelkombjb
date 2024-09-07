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
        Schema::create('buku_tamu', function (Blueprint $table) {
            $table->id('no_buku_tamu');
            $table->string('nama_tamu')->length(50);
            $table->string('asal_instansi')->length(50);
            $table->string('alamat')->length(100);
            $table->string('no_hp')->length(12);
            $table->date('tanggal');
            $table->string('keperluan')->length(150);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku_tamu');
    }
};
