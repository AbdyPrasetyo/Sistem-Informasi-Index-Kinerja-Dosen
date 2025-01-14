<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\IKDController;
use App\Http\Controllers\Admin\KrsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\FakultasController;
use App\Http\Controllers\Admin\KriteriaController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\MataKuliahController;
use App\Http\Controllers\Admin\SubKriteriaController;
use App\Http\Controllers\Dosen\DosenResultController;
use App\Http\Controllers\Mahasiswa\KuisionerController;
use App\Http\Controllers\Admin\SkalaPenilaianController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.kuisioner.get.subkriteria');
// });
Route::get('/', [AuthenticatedSessionController::class, 'create'])
->name('login');

// Route::get('eroor', function () {
//     return view('errors.403');
// });
Route::fallback(function () {
    return view('errors.404');
});

// Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//  Menu admin
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('dosen', [DosenController::class, 'index'])->name('dosen.index');
    Route::get('dosen/add/', [DosenController::class, 'create'])->name('dosen/add/.create');
    Route::post('dosen', [DosenController::class, 'store'])->name('dosen.store');
    Route::get('dosen/{id}/', [DosenController::class, 'edit'])->name('dosen.edit');
    Route::put('dosen/{id}/', [DosenController::class, 'update'])->name('dosen.update');
    Route::delete('dosen/{id}/', [DosenController::class, 'destroy'])->name('dosen.destroy');

    Route::get('mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('mahasiswa/add/', [MahasiswaController::class, 'create'])->name('mahasiswa/add/.create');
    Route::post('mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('mahasiswa/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
    Route::delete('mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');

    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('admin/add/', [AdminController::class, 'create'])->name('admin/add/.create');
    Route::post('admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('admin/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    Route::get('fakultas', [FakultasController::class, 'index'])->name('fakultas.index');
    Route::get('fakultas/add', [FakultasController::class, 'create'])->name('fakultas.create');
    Route::post('fakultas', [FakultasController::class, 'store'])->name('fakultas.store');
    Route::get('fakultas/{id}', [FakultasController::class, 'edit'])->name('fakultas.edit');
    Route::put('fakultas/{id}', [FakultasController::class, 'update'])->name('fakultas.update');
    Route::delete('fakultas/{fakultas}', [FakultasController::class, 'destroy'])->name('fakultas.destroy');

    Route::get('prodi', [ProdiController::class, 'index'])->name('prodi.index');
    Route::get('prodi/add', [ProdiController::class, 'create'])->name('prodi.create');
    Route::post('prodi', [ProdiController::class, 'store'])->name('prodi.store');
    Route::get('prodi/{id}', [ProdiController::class, 'edit'])->name('prodi.edit');
    Route::put('prodi/{id}', [ProdiController::class, 'update'])->name('prodi.update');
    Route::delete('prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

    Route::get('matkul', [MataKuliahController::class, 'index'])->name('matkul.index');
    Route::get('matkul/add', [MataKuliahController::class, 'create'])->name('matkul.create');
    Route::get('matkul/{id}', [MataKuliahController::class, 'edit'])->name('matkul.edit');
    Route::post('matkul', [MataKuliahController::class, 'store'])->name('matkul.store');
    Route::put('matkul/{id}', [MataKuliahController::class, 'update'])->name('matkul.update');
    Route::delete('matkul/{mataKuliah}', [MataKuliahController::class, 'destroy'])->name('matkul.destroy');

    Route::get('kelas', [KelasController::class, 'index'])->name('kelas.index');
    Route::get('kelas/add', [KelasController::class, 'create'])->name('kelas.create');
    Route::post('kelas', [KelasController::class, 'store'])->name('kelas.store');
    Route::get('kelas/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
    Route::put('kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
    Route::delete('kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');

    Route::get('krs', [KrsController::class, 'index'])->name('krs.index');
    Route::get('krs/add', [KrsController::class, 'create'])->name('krs.create');
    Route::post('krs', [KrsController::class, 'store'])->name('krs.store');
    Route::get('krs/{id}', [KrsController::class, 'edit'])->name('krs.edit');
    Route::put('krs/{id}', [KrsController::class, 'update'])->name('krs.update');
    Route::delete('krs/{id}', [KmrsController::class, 'destroy'])->name('krs.destroy');

    Route::get('skala', [SkalaPenilaianController::class, 'index'])->name('skala.index');
    Route::get('skala/add', [SkalaPenilaianController::class, 'create'])->name('skala.create');
    Route::post('skala', [SkalaPenilaianController::class, 'store'])->name('skala.store');
    Route::get('skala/{id}', [SkalaPenilaianController::class, 'edit'])->name('skala.edit');
    Route::put('skala/{id}', [SkalaPenilaianController::class, 'update'])->name('skala.update');
    Route::delete('skala/{id}', [SkalaPenilaianController::class, 'destroy'])->name('skala.destroy');


    Route::get('kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
    Route::get('kriteria/add', [KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('kriteria/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::put('kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('kriteria/{id}', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');


    Route::get('subkriteria', [SubKriteriaController::class, 'index'])->name('subkriteria.index');
    Route::get('subkriteria/add', [SubKriteriaController::class, 'create'])->name('subkriteria.create');
    Route::post('subkriteria', [SubKriteriaController::class, 'store'])->name('subkriteria.store');
    Route::get('subkriteria/{id}', [SubKriteriaController::class, 'edit'])->name('subkriteria.edit');
    Route::put('subkriteria/{id}', [SubKriteriaController::class, 'update'])->name('subkriteria.update');
    Route::delete('subkriteria/{id}', [SubKriteriaController::class, 'destroy'])->name('subkriteria.destroy');

    // Route::get('ikd', [IKDController::class, 'showPenilaian'])->name('ikd.showPenilaian');
    Route::get('ikd', [IKDController::class, 'index'])->name('ikd.index');
    // Route::get('/ikd/detail/{dosenId}', [PenilaianKinerjaController::class, 'showDetail'])->name('ikd.detail');
    Route::get('ikd/{dosen}', [IKDController::class, 'showDetail'])->name('ikd.showDetail');
    Route::get('/get-prodi/{fakultasId}',[IKDController::class, 'getProdiByFakultas'])->name('getProdiByFakultas');
});

// dosen
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('result-ikd', [DosenResultController::class, 'ikdDosen'])->name('result-ikd.ikdDosen');
    Route::get('kritik-saran', [DosenResultController::class, 'kritik'])->name('kritik-saran.kritik');
    Route::get('getmahasiswa', [DosenResultController::class, 'getMahasiswa'])->name('getmahasiswa.getMahasiswa');
});

// mahasiswa
// Route::get('kuisioner', [KuisionerController::class, 'showForm'])->name('kuisioner.showForm');
// Route::post('kuisioner', [KuisionerController::class, 'store'])->name('kuisioner.store');
Route::middleware(['auth', 'role:3'])->group(function () {
    Route::get('kuisioner', [KuisionerController::class, 'index'])->name('kuisioner.index');
    Route::post('kuisioner', [KuisionerController::class, 'store'])->name('kuisioner.store');
    Route::get('kuisioner/form/{dosen_id}', [KuisionerController::class, 'form'])->name('kuisioner.form');
    Route::get('kuisioner/show/{dosen_id}', [KuisionerController::class, 'show'])->name('kuisioner.show');


    Route::get('kuisioner/results/{dosen}', [KuisionerController::class, 'showResults'])->name('kuisioner.results');
});


require __DIR__.'/auth.php';
