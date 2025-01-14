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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('kelas_id');
            $table->unsignedBigInteger('matakuliah_id');
            $table->unsignedBigInteger('dosen_id');
            $table->string('tahun_ajaran');
            $table->foreign('matakuliah_id')->references('matakuliah_id')->on('matakuliah')->onDelete('cascade');
            $table->foreign('dosen_id')->references('dosen_id')->on('dosen')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
