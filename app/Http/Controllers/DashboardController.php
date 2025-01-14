<?php

namespace App\Http\Controllers;

use App\Models\KRS;
use App\Models\Admin;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Kriteria;
use App\Models\Mahasiswa;
use App\Models\Penilaian;
use App\Models\MataKuliah;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use App\Models\SkalaPenilaian;
use App\Models\DetailPenilaian;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $loggedInUser = Auth::user();

        $role = $loggedInUser->role;
        $data = [];
        if ($loggedInUser->role == '3') {
            return $this->mahasiswaDashboard($loggedInUser);
        } elseif ($loggedInUser->role == '2') {
            return $this->dosenDashboard($loggedInUser);
        } elseif ($loggedInUser->role == '1') {
            return $this->adminDashboard($loggedInUser);
        }

        return redirect('/');
    }
    private function mahasiswaDashboard($loggedInUser)
    {
        $mahasiswa = $loggedInUser->mahasiswa;

        $jumlahMatkul = 0;
        $totalSudahDiisi = 0;
        $totalBelumDiisi = 0;
        $percentageFilled = 0;
        $percentageNotFilled = 0;
        $dosenStatus = collect();

        if ($mahasiswa) {
            $mahasiswaId = $mahasiswa->mahasiswa_id;

            $jumlahMatkul = KRS::where('mahasiswa_id', $mahasiswaId)->count();

            $krs = KRS::where('mahasiswa_id', $mahasiswaId)->with('kelas.dosen')->get();
            $dosenKelas = $krs->pluck('kelas.dosen')->unique('dosen_id');
            $penilaian = Penilaian::where('mahasiswa_id', $mahasiswaId)->get();

            $dosenStatus = $dosenKelas->map(function($dosen) use ($penilaian) {
                $dosen->sudahDiisi = $penilaian->contains('dosen_id', $dosen->dosen_id);
                return $dosen;
            });

            $totalSudahDiisi = $dosenStatus->where('sudahDiisi', true)->count();
            $totalBelumDiisi = $dosenStatus->where('sudahDiisi', false)->count();
            $totalLecturers = $dosenStatus->count();
            $percentageFilled = $totalLecturers > 0 ? ($totalSudahDiisi / $totalLecturers) * 100 : 0;
            $percentageNotFilled = $totalLecturers > 0 ? ($totalBelumDiisi / $totalLecturers) * 100 : 0;
        }

        return view('dashboard', [
            'jumlahMatkul' => $jumlahMatkul,
            'totalSudahDiisi' => $totalSudahDiisi,
            'totalBelumDiisi' => $totalBelumDiisi,
            'percentageFilled' => $percentageFilled,
            'percentageNotFilled' => $percentageNotFilled,
            'dosenKelas' => $dosenStatus,
        ]);
    }





    protected function dosenDashboard($loggedInUser)
    {
        $dosen = $loggedInUser->dosen;

        if ($dosen) {
            $dosenId = $dosen->dosen_id;


            $jumlahMatakuliah = Kelas::whereHas('matkul', function ($query) use ($dosenId) {
                                $query->where('dosen_id', $dosenId);
                                })->count();
            $jumlahKelas = Kelas::where('dosen_id', $dosenId)->count();

            $jumlahMahasiswa = Kelas::where('dosen_id', $dosenId)
                        ->with('krs.mahasiswa')
                        ->get()
                        ->flatMap(function ($kelas) {
                            return $kelas->krs->pluck('mahasiswa');
                        })
                        ->unique('mahasiswa_id')
                        ->count();

            $tahunAjaranTerbaru = Kelas::where('dosen_id', $dosenId)
                        ->max('tahun_ajaran');

            $jumlahKuisioner = Penilaian::whereHas('krs.kelas', function ($query) use ($dosenId, $tahunAjaranTerbaru) {
                            $query->where('dosen_id', $dosenId)
                            ->where('tahun_ajaran', $tahunAjaranTerbaru);
                        })
                        ->whereHas('detailPenilaianKinerja')
                        ->count();
            $tahunAjaranList = Kelas::distinct('tahun_ajaran')->pluck('tahun_ajaran');

            $criteria = Kriteria::with('subKriteria')->get();

            $penilaianByTahunAjaran = collect();

            foreach ($tahunAjaranList as $tahunAjaran) {
                $dosenData = [
                    'dosen' => $dosenId,
                    'criteria_scores' => [],
                    'ikd' => 0,
                    'total_respondents' => 0
                ];

            $totalIKD = 0;
            $uniqueRespondents = collect();

            foreach ($criteria as $criterion) {
                $subCriteria = $criterion->subKriteria;

                $totalSubCriteriaScore = 0;
                $subCriteriaCount = $subCriteria->count();
                $subCriteriaScores = [];

                foreach ($subCriteria as $subCriterion) {
                    $penilaian = DetailPenilaian::where('subkriteria_id', $subCriterion->subkriteria_id)
                        ->whereHas('penilaianKinerja', function ($query) use ($dosenId, $tahunAjaran) {
                            $query->where('dosen_id', $dosenId)
                                ->whereHas('krs.kelas', function ($query) use ($tahunAjaran) {
                                    $query->where('tahun_ajaran', $tahunAjaran);
                                });
                        })
                        ->get();

                    $penilaian->each(function ($detailPenilaian) use ($uniqueRespondents) {
                    $uniqueRespondents->push($detailPenilaian->penilaianKinerja->krs->mahasiswa_id);
              });

              $totalSubCriterionScore = $penilaian->sum(function ($detailPenilaian) {
                    return SkalaPenilaian::find($detailPenilaian->skala_id)->nilai;
              });

              $averageScore = $penilaian->count() > 0 ? $totalSubCriterionScore / $penilaian->count() : 0;
              $totalSubCriteriaScore += $averageScore;
              $subCriteriaScores[$subCriterion->nama_subkriteria] = [
                  'average_score' => number_format($averageScore, 2),
                  'respondents_count' => $penilaian->count()
              ];
          }

          $averageSubCriteriaScore = $subCriteriaCount > 0 ? $totalSubCriteriaScore / $subCriteriaCount : 0;
          $totalCriterionScore = $averageSubCriteriaScore * ($criterion->bobot / 100);
          $totalIKD += $totalCriterionScore;

          $dosenData['criteria_scores'][$criterion->nama_kriteria] = [
              'score' => number_format($totalCriterionScore, 2),
              'average_response' => number_format($averageSubCriteriaScore, 2),
              'subcriteria_scores' => $subCriteriaScores
          ];
          }

        $dosenData['ikd'] = number_format($totalIKD, 2);
        //   $dosenData['classification'] = $this->classifyIKD($totalIKD);
        $dosenData['total_respondents'] = $uniqueRespondents->unique()->count();
        $penilaianByTahunAjaran->put($tahunAjaran, $dosenData);
      }
        $penilaianByTahunAjaran = $penilaianByTahunAjaran->sortKeysDesc();
        return view('dashboard', compact('jumlahMatakuliah', 'jumlahKelas', 'jumlahMahasiswa','jumlahKuisioner', 'penilaianByTahunAjaran', 'totalIKD'));
    }
}

private function adminDashboard($loggedInUser)
{
    $mahasiswa = Mahasiswa::all()->count();
    $matkul = MataKuliah::all()->count();
    $prodis = Prodi::all()->count();
    $fakultass = Fakultas::all()->count();
    $dosens = Dosen::all()->count();
    $admin = Admin::all()->count();
    $skala = SkalaPenilaian::all()->count();
    $kriteria = Kriteria::all()->count();
    $subKriteria = SubKriteria::all()->count();
    $penilaian = Penilaian::all()->count();
    $kelas = Kelas::all()->count();
    $KRS = KRS::all()->count();

    // Ambil list fakultas
    $fakultasList = Fakultas::all();

    // Ambil semua tahun ajaran yang ada di tabel kelas
    $tahunAjaranList = Kelas::select('tahun_ajaran')->distinct()->orderBy('tahun_ajaran')->get()->pluck('tahun_ajaran');

    // Mengumpulkan data IKD per fakultas untuk seluruh tahun ajaran
    $ikdData = [];

    foreach ($fakultasList as $fakultas) {
        foreach ($tahunAjaranList as $tahunAjaran) {
            $totalIKD = 0;
            $dosenCount = 0;

            foreach ($fakultas->prodi as $prodi) {
                foreach ($prodi->dosens as $dosen) {
                    if ($dosen) { // Pastikan objek $dosen valid
                        $dosenIKD = $this->calculateDosenIKD($dosen->dosen_id, $tahunAjaran);
                        if ($dosenIKD !== null) {
                            $totalIKD += $dosenIKD;
                            $dosenCount++;
                        }
                    }
                }
            }

            $averageIKD = $dosenCount > 0 ? $totalIKD / $dosenCount : 0;
            $ikdData[$fakultas->nama_fakultas][$tahunAjaran] = $averageIKD;
        }
    }

    $series = [];
    foreach ($ikdData as $fakultas => $data) {
        $formattedData = [];
        foreach ($data as $tahunAjaran => $averageIKD) {
            $formattedData[] = [
                'x' => $tahunAjaran,
                'y' => $averageIKD,
            ];
        }
        $series[] = [
            'name' => $fakultas,
            'data' => $formattedData,
        ];
    }

    return view('dashboard', [
        'mahasiswa' => $mahasiswa,
        'matkul' => $matkul,
        'prodis' => $prodis,
        'fakultass' => $fakultass,
        'dosens' => $dosens,
        'admin' => $admin,
        'skala' => $skala,
        'kelas' => $kelas,
        'KRS' => $KRS,
        'kriteria' => $kriteria,
        'subKriteria' => $subKriteria,
        'penilaian' => $penilaian,
        'series' => $series,
        'tahunAjaranList' => $tahunAjaranList,
    ]);
}

private function calculateDosenIKD($dosen_id, $tahunAjaran)
{
    $penilaianKinerja = Penilaian::whereHas('krs.kelas', function ($query) use ($dosen_id, $tahunAjaran) {
        $query->where('dosen_id', $dosen_id)
              ->where('tahun_ajaran', $tahunAjaran);
    })->get();

    if ($penilaianKinerja->isEmpty()) {
        return null;
    }

    $totalNilai = 0;
    $jumlahPenilaian = 0;

    foreach ($penilaianKinerja as $penilaian) {
        $detailPenilaian = $penilaian->detailPenilaianKinerja;
        foreach ($detailPenilaian as $detail) {
            $skalaPenilaian = SkalaPenilaian::find($detail->skala_id);
            if ($skalaPenilaian) {
                $totalNilai += $skalaPenilaian->nilai;
                $jumlahPenilaian++;
            }
        }
    }

    $averageIKD = $jumlahPenilaian > 0 ? $totalNilai / $jumlahPenilaian : null;

    return $averageIKD;
}






// private function adminDashboard($loggedInUser)
// {
//     $mahasiswa = Mahasiswa::all()->count();
//     $matkul = MataKuliah::all()->count();
//     $prodi = Prodi::all()->count();
//     $fakultas = Fakultas::all()->count();
//     $dosen = Dosen::all()->count();
//     $admin = Admin::all()->count();
//     $skala = SkalaPenilaian::all()->count();
//     $kriteria = Kriteria::all()->count();
//     $subKriteria = SubKriteria::all()->count();
//     $penilaian = Penilaian::all()->count();

//     // Ambil tahun ajaran terbaru dari tabel Kelas
//     $tahunAjaranTerbaru = Kelas::max('tahun_ajaran');

//     // Jika Anda memerlukan daftar tahun ajaran, misalnya untuk dropdown atau grafik
//     $tahunAjaranList = Kelas::distinct('tahun_ajaran')->pluck('tahun_ajaran');

//     // Ambil data penilaian untuk grafik rata-rata IKD per fakultas
//     $penilaianData = $this->showPenilaian(new Request([
//         'tahun_ajaran' => $tahunAjaranTerbaru, // Anda bisa atur tahun ajaran default di sini
//     ]));

//     // Ambil data penilaian dari $penilaianData
//     $penilaianData = $penilaianData['penilaianData'];

//     // Hitung rata-rata IKD per fakultas
//     $ikdPerFakultas = [];

//     foreach ($penilaianData as $data) {
//         $fakultas = $data['dosen']->prodi->fakultas->nama_fakultas;

//         if (!isset($ikdPerFakultas[$fakultas])) {
//             $ikdPerFakultas[$fakultas] = [
//                 'total_ikd' => 0,
//                 'count' => 0,
//                 'average_ikd' => 0,
//             ];
//         }

//         // Tambahkan nilai IKD dari data penilaian
//         $ikdPerFakultas[$fakultas]['total_ikd'] += $data['ikd'];
//         $ikdPerFakultas[$fakultas]['count']++;
//     }

//     // Hitung rata-rata IKD per fakultas
//     foreach ($ikdPerFakultas as $key => $value) {
//         if ($value['count'] > 0) {
//             $ikdPerFakultas[$key]['average_ikd'] = $value['total_ikd'] / $value['count'];
//         }
//     }

//     // Ambil data penilaian berdasarkan tahun ajaran terbaru
//     $penilaianByTahunAjaran = Penilaian::whereHas('krs.kelas', function ($query) use ($tahunAjaranTerbaru) {
//         $query->where('tahun_ajaran', $tahunAjaranTerbaru);
//     })->get();

//     return view('dashboard', [
//         'mahasiswa' => $mahasiswa,
//         'matkul' => $matkul,
//         'prodi' => $prodi,
//         'fakultas' => $fakultas,
//         'dosen' => $dosen,
//         'admin' => $admin,
//         'skala' => $skala,
//         'kriteria' => $kriteria,
//         'subKriteria' => $subKriteria,
//         'penilaian' => $penilaian,
//         'ikdPerFakultas' => $ikdPerFakultas,
//         'tahunAjaranTerbaru' => $tahunAjaranTerbaru,
//         'tahunAjaranList' => $tahunAjaranList,
//         'penilaianByTahunAjaran' => $penilaianByTahunAjaran,
//     ]);
// }



// private function showPenilaian(Request $request)
// {
//     // Ambil semua dosen dengan eager loading relasi 'prodi' untuk mengurangi jumlah query
//     $dosenQuery = Dosen::with('prodi');

//     if ($request->filled('fakultas_id')) {
//         $dosenQuery->whereHas('prodi', function($query) use ($request) {
//             $query->where('fakultas_id', $request->fakultas_id);
//         });
//     }

//     // Filter berdasarkan prodi
//     if ($request->filled('prodi_id')) {
//         $dosenQuery->where('prodi_id', $request->prodi_id);
//     }

//     $itemsPerPage = $request->get('items_per_page', 5);
//     $dosen = $dosenQuery->paginate($itemsPerPage)->appends(['items_per_page' => $itemsPerPage]);

//     // Ambil semua kriteria dengan eager loading subKriteria
//     $criteria = Kriteria::with('subKriteria')->get();

//     // Filter berdasarkan tahun ajaran
//     $tahunAjaran = $request->input('tahun_ajaran');

//     $penilaianData = [];

//     foreach ($dosen as $d) {
//         $dosenData = [
//             'dosen' => $d,
//             'criteria_scores' => [],
//             'ikd' => 0
//         ];

//         $totalIKD = 0;

//         foreach ($criteria as $criterion) {
//             $subCriteria = $criterion->subKriteria;

//             $totalSubCriteriaScore = 0;
//             $subCriteriaCount = $subCriteria->count();

//             foreach ($subCriteria as $subCriterion) {
//                 // Ambil semua penilaian untuk subkriteria ini berdasarkan tahun ajaran
//                 $penilaian = DetailPenilaian::where('subkriteria_id', $subCriterion->subkriteria_id)
//                     ->whereHas('penilaianKinerja', function ($query) use ($d, $tahunAjaran) {
//                         $query->where('dosen_id', $d->dosen_id)
//                               ->whereHas('krs.kelas', function ($query) use ($tahunAjaran) {
//                                   $query->where('tahun_ajaran', $tahunAjaran);
//                               });
//                     })
//                     ->get();

//                 // Hitung rata-rata nilai untuk subkriteria ini
//                 $averageScore = $penilaian->avg(function ($detailPenilaian) {
//                     return SkalaPenilaian::find($detailPenilaian->skala_id)->nilai;
//                 });

//                 // Tambahkan rata-rata nilai ke total subkriteria score
//                 $totalSubCriteriaScore += $averageScore;
//             }

//             // Hitung rata-rata dari semua subkriteria
//             $averageSubCriteriaScore = $subCriteriaCount > 0 ? $totalSubCriteriaScore / $subCriteriaCount : 0;

//             // Hitung nilai total untuk kriteria ini
//             $totalCriterionScore = $averageSubCriteriaScore * ($criterion->bobot / 100);

//             // Tambahkan nilai kriteria ke total IKD
//             $totalIKD += $totalCriterionScore;

//             $dosenData['criteria_scores'][$criterion->nama_kriteria] = $totalCriterionScore;
//         }

//         $dosenData['ikd'] = $totalIKD;
//         $dosenData['classification'] = $this->classifyIKD($totalIKD);

//         // Tambahkan tahun ajaran ke data dosen
//         $dosenData['tahun_ajaran'] = $tahunAjaran;

//         $penilaianData[] = $dosenData;
//     }

//     return [
//         'penilaianData' => $penilaianData,
//         'dosenPagination' => $dosen,
//     ];
// }

// private function classifyIKD($ikd)
// {
//     $badgeClass = '';
//     $badgeText = '';

//     if ($ikd >= 4.00 && $ikd <= 5.00) {
//         $badgeClass = 'bg-lightprimary text-primary dark:bg-darksuccess dark:text-primary';
//         $badgeText = 'Sangat Baik (Standar Minimal Kinerja Selalu Tercapai Lebih)';
//     } elseif ($ikd >= 3.00 && $ikd < 4.00) {
//         $badgeClass = 'bg-lightprimary text-primary dark:bg-darkprimary dark:text-primary';
//         $badgeText = 'Baik (Standar Minimal Kinerja Tercapai Lebih)';
//     } elseif ($ikd >= 2.00 && $ikd < 3.00) {
//         $badgeClass = 'bg-lightwarning text-warning dark:bg-darkwarning dark:text-warning';
//         $badgeText = 'Standar (Standar Minimal Kinerja Tercapai)';
//     } elseif ($ikd >= 1.00 && $ikd < 2.00) {
//         $badgeClass = 'bg-lighterror text-error dark:bg-darkerror dark:text-error';
//         $badgeText = 'Kurang (Standar Minimal Kinerja Tercapai Sebagian)';
//     } elseif ($ikd >= 0.00 && $ikd < 1.00) {
//         $badgeClass = 'bg-lighterror text-error dark:bg-darkerror dark:text-error';
//         $badgeText = 'Sangat Kurang (Standar Minimal Kinerja Tidak Tercapai)';
//     } else {
//         $badgeClass = 'bg-gray-300 text-gray-600 dark:bg-gray-700 dark:text-gray-400';
//         $badgeText = 'Belum Diisi (Menunggu Jawaban Responden)';
//     }

//     return [
//         'badgeClass' => $badgeClass,
//         'badgeText' => $badgeText,
//     ];
// }


    }







// // kuisioner perfakultas

//  // Ambil semua tahun ajaran yang tersedia
//  $tahunAjaranList = Kelas::distinct('tahun_ajaran')->pluck('tahun_ajaran');

//  // Ambil semua kriteria beserta subkriteria mereka
//  $criteria = Kriteria::with('subKriteria')->get();

//  // Inisialisasi koleksi untuk menyimpan data penilaian berdasarkan tahun ajaran dan fakultas
//  $facultyIKDAverages = collect();

//  foreach ($tahunAjaranList as $tahunAjaran) {
//      // Inisialisasi data penilaian per tahun ajaran
//      $tahunAjaranData = [];

//      foreach ($criteria as $criterion) {
//          $subCriteria = $criterion->subKriteria;

//          foreach ($subCriteria as $subCriterion) {
//              // Ambil penilaian subkriteria berdasarkan tahun ajaran
//              $penilaian = DetailPenilaian::where('subkriteria_id', $subCriterion->subkriteria_id)
//                  ->whereHas('penilaianKinerja', function ($query) use ($tahunAjaran) {
//                      $query->whereHas('krs.kelas', function ($query) use ($tahunAjaran) {
//                          $query->where('tahun_ajaran', $tahunAjaran);
//                      });
//                  })
//                  ->get();

//              // Iterasi untuk menghitung rata-rata IKD per fakultas
//              $penilaian->each(function ($detailPenilaian) use (&$tahunAjaranData) {
//                  $dosen = $detailPenilaian->penilaianKinerja->dosen;
//                  $fakultas = $dosen->prodi->fakultas->nama_fakultas;

//                  if (!isset($tahunAjaranData[$fakultas])) {
//                      $tahunAjaranData[$fakultas] = [
//                          'total_score' => 0,
//                          'count' => 0,
//                      ];
//                  }

//                  $skalaId = $detailPenilaian->skala_id;
//                  $nilai = SkalaPenilaian::find($skalaId)->nilai;

//                  $tahunAjaranData[$fakultas]['total_score'] += $nilai;
//                  $tahunAjaranData[$fakultas]['count']++;
//              });
//          }
//      }

//      // Hitung rata-rata IKD per fakultas
//      foreach ($tahunAjaranData as $fakultas => $data) {
//          $averageIKD = $data['count'] > 0 ? $data['total_score'] / $data['count'] : 0;
//          $facultyIKDAverages->push([
//              'tahun_ajaran' => $tahunAjaran,
//              'fakultas' => $fakultas,
//              'average_ikd' => number_format($averageIKD, 2),
//          ]);
//      }
//  }


// // endkuisioner perfakultas



