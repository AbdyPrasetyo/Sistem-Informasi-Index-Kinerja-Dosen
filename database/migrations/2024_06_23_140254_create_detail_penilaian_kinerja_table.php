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
        Schema::create('detail_penilaian_kinerja', function (Blueprint $table) {
            $table->id('detail_penilaian_id');
            $table->unsignedBigInteger('penilaian_id');
            $table->unsignedBigInteger('subkriteria_id');
            $table->unsignedBigInteger('skala_id');
            $table->foreign('penilaian_id')->references('penilaian_id')->on('penilaian_kinerja')->onDelete('cascade');
            $table->foreign('subkriteria_id')->references('subkriteria_id')->on('sub_kriteria')->onDelete('cascade');
            $table->foreign('skala_id')->references('skala_id')->on('skala_penilaian')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penilaian_kinerja');
    }
};
