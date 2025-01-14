<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\KRS;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\Penilaian;
use App\Models\KritikSaran;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use App\Models\SkalaPenilaian;
use App\Models\DetailPenilaian;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KuisionerController extends Controller
{


// public function showForm()
// {
//     $kriteria = Kriteria::with('subkriteria')->get();
//     $skala = SkalaPenilaian::all();
//     return view('mahasiswa.kuisioner', compact('kriteria', 'skala'));
// }





// public function index()
// {
//     $mahasiswaId = auth()->user()->mahasiswa->mahasiswa_id;

//     // Mendapatkan tahun ajaran terbaru dari tabel Kelas
//     $tahunAjaranTerbaru = Kelas::max('tahun_ajaran');

//     // Memuat KRS untuk tahun ajaran terbaru dengan relasi kelas dan dosen
//     $krs = KRS::where('mahasiswa_id', $mahasiswaId)
//                ->whereHas('kelas', function ($query) use ($tahunAjaranTerbaru) {
//                    $query->where('tahun_ajaran', $tahunAjaranTerbaru);
//                })
//                ->with('kelas.dosen')
//                ->get();
//     // dd($krs);

//     // Menyusun dosen yang diajar hanya untuk tahun ajaran terbaru
//     $dosenKelas = $krs->pluck('kelas.dosen')->unique('dosen_id');
//     // dd($dosenKelas);

//     // Memeriksa status pengisian kuisioner
//     $penilaian = Penilaian::where('mahasiswa_id', $mahasiswaId)->get();

//     $dosenStatus = $dosenKelas->map(function($dosen) use ($penilaian) {
//         $dosen->sudahDiisi = $penilaian->contains('dosen_id', $dosen->dosen_id);
//         return $dosen;
//     });

//     return view('mahasiswa.kuisioner.index', [
//         'dosenKelas' => $dosenStatus,
//     ]);
// }




public function index()
{
    $mahasiswaId = auth()->user()->mahasiswa->mahasiswa_id;

    // Mendapatkan tahun ajaran terbaru dari tabel Kelas
    $tahunAjaranTerbaru = Kelas::max('tahun_ajaran');

    // Memuat KRS untuk tahun ajaran terbaru dengan relasi kelas dan dosen
    $krs = KRS::where('mahasiswa_id', $mahasiswaId)
               ->whereHas('kelas', function ($query) use ($tahunAjaranTerbaru) {
                   $query->where('tahun_ajaran', $tahunAjaranTerbaru);
               })
               ->with('kelas.dosen')
               ->get();

    // Menyusun dosen yang diajar hanya untuk tahun ajaran terbaru
    $dosenKelas = $krs->pluck('kelas.dosen')->unique('dosen_id');

    // Memeriksa status pengisian kuisioner berdasarkan tahun ajaran terbaru
    $penilaian = Penilaian::where('mahasiswa_id', $mahasiswaId)
                          ->whereHas('krs.kelas', function ($query) use ($tahunAjaranTerbaru) {
                              $query->where('tahun_ajaran', $tahunAjaranTerbaru);
                          })
                          ->get();

    $dosenStatus = $dosenKelas->map(function($dosen) use ($penilaian) {
        $dosen->sudahDiisi = $penilaian->contains(function($value) use ($dosen) {
            return $value->dosen_id == $dosen->dosen_id;
        });
        return $dosen;
    });

    return view('mahasiswa.kuisioner.index', [
        'dosenKelas' => $dosenStatus,
    ]);
}


// public function form($dosen_id)
//     {
//         $kriteria = Kriteria::with('subkriteria')->get();
//         $skala = SkalaPenilaian::all();

//         $dosen = Dosen::findOrFail($dosen_id);

//         $mahasiswaId = auth()->user()->mahasiswa->mahasiswa_id;
//         $penilaian = Penilaian::where('mahasiswa_id', $mahasiswaId)
//                               ->where('dosen_id', $dosen_id)
//                               ->first();
//        if ($penilaian) {
//             Alert::error('Anda sudah menilai dosen ini.', 'error');
//              return redirect()->route('kuisioner.index');
//                             }

//         $krs = KRS::where('mahasiswa_id', $mahasiswaId)
//                   ->whereHas('kelas', function ($query) use ($dosen_id) {
//                       $query->where('dosen_id', $dosen_id);
//                   })
//                   ->first();

//         return view('mahasiswa.kuisioner.form', compact('dosen','kriteria','skala','penilaian','krs'));
//     }

    // dd($penilaian);

    public function form($dosen_id)
{
    $kriteria = Kriteria::with('subkriteria')->get();
    $skala = SkalaPenilaian::all();

    $dosen = Dosen::findOrFail($dosen_id);

    $mahasiswaId = auth()->user()->mahasiswa->mahasiswa_id;
    $tahunAjaranTerbaru = Kelas::max('tahun_ajaran');

    $penilaian = Penilaian::where('mahasiswa_id', $mahasiswaId)
                          ->where('dosen_id', $dosen_id)
                          ->whereHas('krs.kelas', function ($query) use ($tahunAjaranTerbaru) {
                              $query->where('tahun_ajaran', $tahunAjaranTerbaru);
                          })
                          ->first();
    if ($penilaian) {
        return redirect()->route('kuisioner.index')->with('error', 'Anda sudah menilai dosen ini untuk tahun ajaran terbaru.');
    }

    $krs = KRS::where('mahasiswa_id', $mahasiswaId)
              ->whereHas('kelas', function ($query) use ($dosen_id, $tahunAjaranTerbaru) {
                  $query->where('dosen_id', $dosen_id)
                        ->where('tahun_ajaran', $tahunAjaranTerbaru);
              })
              ->first();

    return view('mahasiswa.kuisioner.form', compact('dosen','kriteria','skala','penilaian','krs'));
}

    // public function store(Request $request)
    // {

    //     $mahasiswaId = auth()->user()->mahasiswa->mahasiswa_id;
    //     $dosenId = $request->input('dosen_id');
    //     $krsId = $request->input('krs_id');

    //     // Debug krs_id
    //     if (is_null($krsId)) {
    //         return back()->withErrors(['krs_id' => 'KRS ID is null']);
    //     }

    //     // Cek apakah sudah pernah mengisi kuisioner
    //     $existingPenilaian = Penilaian::where('mahasiswa_id', $mahasiswaId)
    //                                   ->where('dosen_id', $dosenId)
    //                                   ->first();
    //     if ($existingPenilaian) {
    //         return redirect()->route('kuisioner.index')->with('error', 'Anda sudah mengisi kuisioner untuk dosen ini.');
    //     }

    //     $jawaban = $request->input('jawaban');
    //     foreach ($jawaban as $subkriteriaId => $skalaId) {
    //         if (empty($skalaId)) {
    //             return back()->withErrors(['jawaban' => 'Harap isi semua pertanyaan.']);
    //         }
    //     }

    //     // Buat penilaian baru
    //     $penilaian = Penilaian::create([
    //         'mahasiswa_id' => $mahasiswaId,
    //         'dosen_id' => $dosenId,
    //         'krs_id' => $krsId,
    //     ]);

    //     foreach ($request->input('jawaban') as $subkriteriaId => $nilai) {
    //         DetailPenilaian::create([
    //             'penilaian_id' => $penilaian->penilaian_id,
    //             'subkriteria_id' => $subkriteriaId,
    //             'skala_id' => $nilai,
    //         ]);
    //     }

    //     KritikSaran::create([
    //             'penilaian_id' => $penilaian->penilaian_id,
    //             'kritik' =>  $request->kritik,
    //             'saran' => $request->saran
    //         ]);

    //     return redirect()->route('kuisioner.index')->with('success', 'Kuisioner berhasil disimpan.');
    // }





    public function store(Request $request)
    {
        $mahasiswaId = auth()->user()->mahasiswa->mahasiswa_id;
        $dosenId = $request->input('dosen_id');
        $krsId = $request->input('krs_id');

        // Debug krs_id
        if (is_null($krsId)) {
            return back()->withErrors(['krs_id' => 'KRS ID is null']);
        }

        $tahunAjaranTerbaru = Kelas::max('tahun_ajaran');

        // Cek apakah sudah pernah mengisi kuisioner untuk tahun ajaran terbaru
        $existingPenilaian = Penilaian::where('mahasiswa_id', $mahasiswaId)
                                      ->where('dosen_id', $dosenId)
                                      ->whereHas('krs.kelas', function ($query) use ($tahunAjaranTerbaru) {
                                          $query->where('tahun_ajaran', $tahunAjaranTerbaru);
                                      })
                                      ->first();
        if ($existingPenilaian) {
            return redirect()->route('kuisioner.index')->with('error', 'Anda sudah mengisi kuisioner untuk dosen ini di tahun ajaran terbaru.');
        }

        $jawaban = $request->input('jawaban');
        foreach ($jawaban as $subkriteriaId => $skalaId) {
            if (empty($skalaId)) {
                return back()->withErrors(['jawaban' => 'Harap isi semua pertanyaan.']);
            }
        }

        // Buat penilaian baru
        $penilaian = Penilaian::create([
            'mahasiswa_id' => $mahasiswaId,
            'dosen_id' => $dosenId,
            'krs_id' => $krsId,
        ]);

        foreach ($request->input('jawaban') as $subkriteriaId => $nilai) {
            DetailPenilaian::create([
                'penilaian_id' => $penilaian->penilaian_id,
                'subkriteria_id' => $subkriteriaId,
                'skala_id' => $nilai,
            ]);
        }

        KritikSaran::create([
            'penilaian_id' => $penilaian->penilaian_id,
            'kritik' =>  $request->kritik,
            'saran' => $request->saran
        ]);

        return redirect()->route('kuisioner.index')->with('success', 'Kuisioner berhasil disimpan.');
    }











    public function show($dosen_id)
    {
        $mahasiswaId = auth()->user()->mahasiswa->mahasiswa_id;

        $penilaian = Penilaian::with('kritiksaran')
                            ->where('mahasiswa_id', $mahasiswaId)
                            ->where('dosen_id', $dosen_id)
                            ->firstOrFail();

        if ($penilaian) {

        $detailPenilaian = DetailPenilaian::where('penilaian_id', $penilaian->penilaian_id)
                                        ->with('subkriteria', 'skalaPenilaian')
                                        ->get();
        $skala = SkalaPenilaian::All();
        return view('mahasiswa.kuisioner.show', compact('penilaian', 'detailPenilaian', 'skala'));
        } else {
            return redirect()->route('penilaian.form', ['dosen_id' => $dosen_id]);
        }
    }


    public function showResults($dosenId)
    {
        $mahasiswaId = Auth::user()->mahasiswa->mahasiswa_id;

        // Ambil penilaian untuk dosen tertentu oleh mahasiswa
        $penilaian = Penilaian::where('mahasiswa_id', $mahasiswaId)
                              ->where('dosen_id', $dosenId)
                              ->first();

        if (!$penilaian) {
            return redirect()->back()->with('error', 'Anda belum mengisi kuisioner untuk dosen ini.');
        }

        // Ambil detail penilaian untuk ditampilkan
        $detailPenilaian = DetailPenilaian::where('penilaian_id', $penilaian->penilaian_id)
                                          ->with('subkriteria', 'skalaPenilaian')
                                          ->get();

        return view('mahasiswa.kuisioner.results', [
            'penilaian' => $penilaian,
            'detailPenilaian' => $detailPenilaian,
        ]);
    }
}
