<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $mahasiswaData = [
            ['user_id' => 3, 'nim' => '19330010', 'nama_lengkap' => 'Andi Pratama', 'prodi_id' => 3, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            ['user_id' => 4, 'nim' => '19330011', 'nama_lengkap' => 'Budi Santoso', 'prodi_id' => 2, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            ['user_id' => 5, 'nim' => '19330017', 'nama_lengkap' => 'Citra Dewi', 'prodi_id' => 1, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 35, 'nim' => '19330013', 'nama_lengkap' => 'Dedi Setiawan', 'prodi_id' => 1, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'KRISTEN', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 36, 'nim' => '19330014', 'nama_lengkap' => 'Eni Sari', 'prodi_id' => 1, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'KATOLIK', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 37, 'nim' => '19330015', 'nama_lengkap' => 'Faisal Rahman', 'prodi_id' => 1, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'HINDU', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 38, 'nim' => '19330016', 'nama_lengkap' => 'Gita Pertiwi', 'prodi_id' => 1, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'BUDHA', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 39, 'nim' => '19330017', 'nama_lengkap' => 'Reza Abdy Prasetyo', 'prodi_id' => 1, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 40, 'nim' => '19330018', 'nama_lengkap' => 'Ika Wulandari', 'prodi_id' => 1, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 41, 'nim' => '19330019', 'nama_lengkap' => 'Joko Susanto', 'prodi_id' => 1, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 42, 'nim' => '19330020', 'nama_lengkap' => 'Kiki Amelia', 'prodi_id' => 2, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'KRISTEN', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 43, 'nim' => '19330021', 'nama_lengkap' => 'Laila Ningsih', 'prodi_id' => 2, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'KATOLIK', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 44, 'nim' => '19330022', 'nama_lengkap' => 'Mamat Hidayat', 'prodi_id' => 2, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'HINDU', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 45, 'nim' => '19330023', 'nama_lengkap' => 'Nia Kusuma', 'prodi_id' => 2, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'BUDHA', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 46, 'nim' => '19330024', 'nama_lengkap' => 'Oka Putra', 'prodi_id' => 2, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 47, 'nim' => '19330025', 'nama_lengkap' => 'Puti Sari', 'prodi_id' => 2, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 48, 'nim' => '19330026', 'nama_lengkap' => 'Qori Alif', 'prodi_id' => 2, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 49, 'nim' => '19330027', 'nama_lengkap' => 'Rizki Adi', 'prodi_id' => 2, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'KRISTEN', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 50, 'nim' => '19330028', 'nama_lengkap' => 'Sari Rahmawati', 'prodi_id' => 2, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'KATOLIK', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 51, 'nim' => '19330029', 'nama_lengkap' => 'Taufik Hidayat', 'prodi_id' => 2, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'HINDU', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 52, 'nim' => '19330030', 'nama_lengkap' => 'Uli Amelia', 'prodi_id' => 3, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'BUDHA', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 53, 'nim' => '19330031', 'nama_lengkap' => 'Vina Putri', 'prodi_id' => 3, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 54, 'nim' => '19330032', 'nama_lengkap' => 'Wira Darma', 'prodi_id' => 3, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 55, 'nim' => '19330033', 'nama_lengkap' => 'Xena Angelia', 'prodi_id' => 3, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 56, 'nim' => '19330034', 'nama_lengkap' => 'Yudi Nugroho', 'prodi_id' => 3, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'KRISTEN', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 57, 'nim' => '19330035', 'nama_lengkap' => 'Zainab Hasanah', 'prodi_id' => 3, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'KATOLIK', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 58, 'nim' => '19330036', 'nama_lengkap' => 'Arief Budiman', 'prodi_id' => 3, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'HINDU', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 59, 'nim' => '19330037', 'nama_lengkap' => 'Bella Kartika', 'prodi_id' => 3, 'gender' => 'Pria', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'BUDHA', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 60, 'nim' => '19330038', 'nama_lengkap' => 'Chandra Prasetya', 'prodi_id' => 3, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
            // ['user_id' => 61, 'nim' => '19330039', 'nama_lengkap' => 'Daniella Sari', 'prodi_id' => 3, 'gender' => 'Wanita', 'tempat_lahir' => 'Berau', 'tanggal_lahir' => '1999-07-31', 'agama' => 'ISLAM', 'status_mahasiswa' => 'AKTIF', 'alamat' => 'JL. S.A Maulana', 'angkatan' => '2019', 'telepon' => '88335566'],
        ];

        foreach ($mahasiswaData as $data) {
            DB::table('mahasiswa')->insert([
                'user_id' => $data['user_id'],
                'nim' => $data['nim'],
                'nama_lengkap' => $data['nama_lengkap'],
                'prodi_id' => $data['prodi_id'],
                'gender' => $data['gender'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'agama' => $data['agama'],
                'status_mahasiswa' => $data['status_mahasiswa'],
                'alamat' => $data['alamat'],
                'angkatan' => $data['angkatan'],
                'telepon' => $data['telepon'],
            ]);
        }
}
}
