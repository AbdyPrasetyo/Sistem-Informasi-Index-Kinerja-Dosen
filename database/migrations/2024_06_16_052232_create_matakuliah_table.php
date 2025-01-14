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
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->id('matakuliah_id');
            $table->string('kode_matakuliah');
            $table->text('nama_matakuliah');
            $table->integer('sks');
            $table->integer('semester');
            $table->unsignedBigInteger('prodi_id');
            $table->foreign('prodi_id')->references('prodi_id')->on('prodi')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliah');
    }
};
