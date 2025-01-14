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
        Schema::create('penilaian_kinerja', function (Blueprint $table) {
            $table->id('penilaian_id');
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('krs_id');
            $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('dosen_id')->references('dosen_id')->on('dosen')->onDelete('cascade');
            $table->foreign('krs_id')->references('krs_id')->on('krs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_kinerja');
    }
};
