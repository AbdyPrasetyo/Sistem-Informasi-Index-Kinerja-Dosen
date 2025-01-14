<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Fakultas::create([
        //     'nama_fakultas' => 'Teknik'
        // ]);
        // Prodi::create([
        //     'nama_prodi' => 'Informatika',
        //     'fakultas_id' => 1
        // ]);

        // User::create([
        //     'name' => 'Admin Test',
        //     'email' => 'admin@example.com',
        //     'password' => Hash::make('admin123'),
        //     'role' => 1, // Admin
        // ]);

        // Admin::create([
        //     'user_id' => 31,
        //     'nip'   => '12345'
        // ]);

        // Buat pengguna dengan role sekretaris
        // User::create([
        //     'name' => 'Dosen Test',
        //     'email' => 'dosen@example.com',
        //     'password' => Hash::make('dosen123'),
        //     'role' => 2, // Sekretaris
        // ]);

        // Dosen::create([
        //     'user_id' => 2,
        //     'prodi_id' => 1,
        //     'nidn'  =>'22334455'
        // ]);


        // // Buat pengguna dengan role notulensi
        // User::create([
        //     'name' => 'Mahasiswa Test',
        //     'email' => 'mahasiswa@example.com',
        //     'password' => Hash::make('mahasiswa123'),
        //     'role' => 3,
        // ]);
        // Mahasiswa::create([
        //     'user_id' => 3,
        //     'prodi_id' => 1,
        //     'nim' => '19330017',
        //     'angkatan' => 2019
        // ]);

    }
}
