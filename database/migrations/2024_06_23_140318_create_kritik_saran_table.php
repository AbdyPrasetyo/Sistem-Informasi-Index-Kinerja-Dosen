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
        Schema::create('kritik_saran', function (Blueprint $table) {
            $table->id('kisa_id');
            $table->unsignedBigInteger('penilaian_id');
            // $table->unsignedBigInteger('mahasiswa_id');
            // $table->unsignedBigInteger('dosen_id');
            $table->text('kritik');
            $table->text('saran');
            // $table->foreign('mahasiswa_id')->references('mahasiswa_id')->on('mahasiswa')->onDelete('cascade');
            // $table->foreign('dosen_id')->references('dosen_id')->on('dosen')->onDelete('cascade');
            $table->foreign('penilaian_id')->references('penilaian_id')->on('penilaian_kinerja')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kritik_saran');
    }
};
