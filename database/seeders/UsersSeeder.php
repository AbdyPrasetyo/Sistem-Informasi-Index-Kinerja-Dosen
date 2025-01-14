<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 1; $i <= 3; $i++) {
            User::create([
                'name' => 'Dosen ' . $i,
                'email' => 'dosen' . $i . '@example.com',
                'password' => Hash::make('dosen123'), // Ganti dengan password yang Anda inginkan
                'role' => 2,
            ]);
        }

        // Seeder untuk role 3 (10 orang)
        // for ($i = 1; $i <= 3; $i++) {
        //     User::create([
        //         'name' => 'Mahasiswa ' . $i,
        //         'email' => 'mahasiswa' . $i . '@example.com',
        //         'password' => Hash::make('mahasiswa123'), // Ganti dengan password yang Anda inginkan
        //         'role' => 3,
        //     ]);
        // }
    }
}
