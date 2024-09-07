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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->unsignedBigInteger('nip')->unique(); // Set the length for nip and make it unique
            $table->string('nama_admin', 50); // Set the length for nama_admin
            $table->string('username', 30); // Set the length for username
            $table->string('email', 30);
            $table->string('password'); // Set the length for password
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
