<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $kriteria = [
            [
                'nama_kriteria' => 'Metode Pengajaran',
                'bobot' => 1,
            ],
            [
                'nama_kriteria' => 'Interaksi dengan Mahasiswa',
                'bobot' => 1,
            ],
            [
                'nama_kriteria' => 'Kompetensi Akademik',
                'bobot' => 1,
            ],
            [
                'nama_kriteria' => 'Pengelolaan Kelas',
                'bobot' => 1,
            ],
            [
                'nama_kriteria' => 'Keterampilan Komunikasi',
                'bobot' => 1,
            ],
            [
                'nama_kriteria' => 'Pengembangan Profesional',
                'bobot' => 1,
            ],
        ];

        // Masukkan data kriteria ke dalam tabel
        foreach ($kriteria as $item) {
            Kriteria::create([
                'nama_kriteria' => $item['nama_kriteria'],
                'bobot' => $item['bobot'],
            ]);
        }
    }
}
