<?php

namespace App\Http\Controllers\Admin;

use App\Models\KRS;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $itemsPerPage = $request->get('items_per_page', 10);
        $krs = KRS::with(['mahasiswa', 'kelas'])->paginate($itemsPerPage);
        $krs->appends(['items_per_page' => $itemsPerPage]);

        return view ('admin.akademik.get.krs', compact( 'krs', 'itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */


     public function create(Request $request)
     {
         $selectedMahasiswaId = $request->input('mahasiswa_id', null);
         $mahasiswa = Mahasiswa::all();

         // Jika ada mahasiswa yang dipilih
         if ($selectedMahasiswaId) {
             // Dapatkan program studi dari mahasiswa yang dipilih
             $selectedMahasiswa = Mahasiswa::with('prodi')->find($selectedMahasiswaId);
             $prodiId = $selectedMahasiswa->prodi->prodi_id;

             // Dapatkan kelas berdasarkan program studi mahasiswa
             $kelas = Kelas::with('matkul', 'dosen', 'matkul.prodi.fakultas')
                         ->whereHas('matkul', function($query) use ($prodiId) {
                             $query->where('prodi_id', $prodiId);
                         })
                         ->orderBy('tahun_ajaran', 'desc')
                         ->get();
         } else {
             // Jika tidak ada mahasiswa yang dipilih, tampilkan semua kelas
             $kelas = Kelas::with('matkul', 'dosen', 'matkul.prodi.fakultas')
                         ->orderBy('tahun_ajaran', 'desc')
                         ->get();
         }

         $krs = $selectedMahasiswaId ? Krs::where('mahasiswa_id', $selectedMahasiswaId)->pluck('kelas_id')->toArray() : [];

         return view('admin.akademik.post.addkrs', compact('kelas', 'mahasiswa', 'krs', 'selectedMahasiswaId'));
     }





//     public function create(Request $request)
// {
//     $selectedMahasiswaId = $request->input('mahasiswa_id', null);
//     $mahasiswa = Mahasiswa::all();
//     $kelas = Kelas::with('matkul', 'dosen', 'matkul.prodi.fakultas')->get();
//     $krs = $selectedMahasiswaId ? Krs::where('mahasiswa_id', $selectedMahasiswaId)->pluck('kelas_id')->toArray() : [];

//     return view('admin.akademik.post.addkrs', compact('kelas', 'mahasiswa', 'krs', 'selectedMahasiswaId'));
// }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $mahasiswaId = $request->input('mahasiswa_id');
    //     $kelasId = $request->input('kelas_id', []);

    //     // Krs::where('mahasiswa_id', $mahasiswaId)->delete();

    //     foreach ($kelasId as $kls) {
    //         Krs::create([
    //             'mahasiswa_id' => $mahasiswaId,
    //             'kelas_id' => $kls,
    //         ]);
    // }

    // return redirect()->route('krs.index')->with('success', 'Data KRS berhasil disimpan');
    // }



    public function store(Request $request)
    {
        $mahasiswaId = $request->input('mahasiswa_id');
        $kelasId = $request->input('kelas_id', []);

        // Ambil KRS yang sudah ada untuk mahasiswa tersebut
        $existingKrs = Krs::where('mahasiswa_id', $mahasiswaId)->pluck('kelas_id')->toArray();

        // Filter kelas_id yang belum ada di KRS
        $newKelasId = array_diff($kelasId, $existingKrs);

        // Simpan data KRS yang baru
        foreach ($newKelasId as $kls) {
            Krs::create([
                'mahasiswa_id' => $mahasiswaId,
                'kelas_id' => $kls,
            ]);
        }

        Alert::success('Data KRS Berhasil Ditambahkan', 'success');
        return redirect()->route('krs.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $krs = KRS::findOrFail($id);
        $krs->delete();
        Alert::info('Data Admin Berhasil Dihapus', 'success');
        return redirect()->route('krs.index');
    }
}
