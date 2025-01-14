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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id('dosen_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nidn')->unique();
            $table->string('nama_lengkap')->nullable();
            $table->unsignedBigInteger('prodi_id');
            $table->string('gender')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('status_dosen')->nullable();
            $table->text('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('prodi_id')->references('prodi_id')->on('prodi')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
