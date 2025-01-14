<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Klasifikasi;
use Illuminate\Http\Request;
use App\Models\SkalaPenilaian;
use App\Models\DetailPenilaian;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class IKDController extends Controller
{
    //


    public function index(Request $request)
    {
        // Ambil tahun ajaran terbaru
        $tahunAjaranTerbaru = Kelas::max('tahun_ajaran');

        // Ambil list fakultas, prodi, dan tahun ajaran
        $criteria = Kriteria::all();
        $fakultasList = Fakultas::all();
        $prodiList = Prodi::all();
        $tahunAjaranList = Kelas::distinct('tahun_ajaran')->pluck('tahun_ajaran');

        // Jika tidak ada tahun ajaran yang dipilih, ambil data untuk tahun ajaran terbaru
        if (!$request->filled('tahun_ajaran')) {
            $request->merge(['tahun_ajaran' => $tahunAjaranTerbaru]);
        }

        // Panggil method showPenilaian untuk mendapatkan data penilaian
        $penilaianData = $this->showPenilaian($request);

        // Data yang dipilih
        $selectedTahunAjaran = $request->input('tahun_ajaran');
        $selectedFakultasId = $request->input('fakultas_id');
        $selectedProdiId = $request->input('prodi_id');
        $itemsPerPage = $request->get('items_per_page', 5);

        // dd($penilaianData);
        // Lakukan pengolahan data penilaian sesuai kebutuhan
        return view('admin.IKD.ikd', compact('criteria','fakultasList', 'prodiList', 'tahunAjaranList', 'penilaianData', 'selectedTahunAjaran', 'selectedFakultasId', 'selectedProdiId', 'itemsPerPage'));
    }

    private function showPenilaian(Request $request)
    {
        // Ambil semua dosen dengan eager loading relasi 'prodi' untuk mengurangi jumlah query
        $dosenQuery = Dosen::with('prodi');

        if ($request->filled('fakultas_id')) {
            $dosenQuery->whereHas('prodi', function($query) use ($request) {
                $query->where('fakultas_id', $request->fakultas_id);
            });
        }

        // Filter berdasarkan prodi
        if ($request->filled('prodi_id')) {
            $dosenQuery->where('prodi_id', $request->prodi_id);
        }
        $itemsPerPage = $request->get('items_per_page', 10);
        $dosen = $dosenQuery->paginate($itemsPerPage)->appends(['items_per_page' => $itemsPerPage]);

        // Ambil semua kriteria dengan eager loading subKriteria
        $criteria = Kriteria::with('subKriteria')->get();

        // Filter berdasarkan tahun ajaran
        $tahunAjaran = $request->input('tahun_ajaran');

        $penilaianData = [];

        foreach ($dosen as $d) {
            $dosenData = [
                'dosen' => $d,
                'criteria_scores' => [],
                'ikd' => 0
            ];

            $totalIKD = 0;

            foreach ($criteria as $criterion) {
                $subCriteria = $criterion->subKriteria;

                $totalSubCriteriaScore = 0;
                $subCriteriaCount = $subCriteria->count();

                foreach ($subCriteria as $subCriterion) {
                    // Ambil semua penilaian untuk subkriteria ini berdasarkan tahun ajaran
                    $penilaian = DetailPenilaian::where('subkriteria_id', $subCriterion->subkriteria_id)
                        ->whereHas('penilaianKinerja', function ($query) use ($d, $tahunAjaran) {
                            $query->where('dosen_id', $d->dosen_id)
                                  ->whereHas('krs.kelas', function ($query) use ($tahunAjaran) {
                                      $query->where('tahun_ajaran', $tahunAjaran);
                                  });
                        })
                        ->get();

                    // Hitung rata-rata nilai untuk subkriteria ini
                    $averageScore = $penilaian->avg(function ($detailPenilaian) {
                        return SkalaPenilaian::find($detailPenilaian->skala_id)->nilai;
                    });

                    // Tambahkan rata-rata nilai ke total subkriteria score
                    $totalSubCriteriaScore += $averageScore;
                }

                // Hitung rata-rata dari semua subkriteria
                $averageSubCriteriaScore = $subCriteriaCount > 0 ? $totalSubCriteriaScore / $subCriteriaCount : 0;

                // Hitung nilai total untuk kriteria ini
                $totalCriterionScore = $averageSubCriteriaScore * ($criterion->bobot / 100);

                // Tambahkan nilai kriteria ke total IKD
                $totalIKD += $totalCriterionScore;

                $dosenData['criteria_scores'][$criterion->nama_kriteria] = $totalCriterionScore;
            }

            $dosenData['ikd'] = $totalIKD;
            $dosenData['classification'] = $this->classifyIKD($totalIKD);

            // Tambahkan tahun ajaran ke data dosen
            $dosenData['tahun_ajaran'] = $tahunAjaran;

            $penilaianData[] = $dosenData;
        }

        return [
            'penilaianData' => $penilaianData,
            'dosenPagination' => $dosen
        ];
    }
//




    public function showDetail(Request $request, Dosen $dosen)
    {
        // Ambil semua tahun ajaran yang tersedia
        $tahunAjaranList = Kelas::distinct('tahun_ajaran')->pluck('tahun_ajaran');

        // Ambil semua kriteria beserta subkriteria mereka
        $criteria = Kriteria::with('subKriteria')->get();

        // Inisialisasi koleksi untuk menyimpan data penilaian berdasarkan tahun ajaran
        $penilaianByTahunAjaran = collect();

        foreach ($tahunAjaranList as $tahunAjaran) {
            // Inisialisasi data dosen per tahun ajaran
            $dosenData = [
                'dosen' => $dosen,
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
                    // Ambil  penilaian subkriteria  berdasarkan tahun ajaran
                    $penilaian = DetailPenilaian::where('subkriteria_id', $subCriterion->subkriteria_id)
                        ->whereHas('penilaianKinerja', function ($query) use ($dosen, $tahunAjaran) {
                            $query->where('dosen_id', $dosen->dosen_id)
                                ->whereHas('krs.kelas', function ($query) use ($tahunAjaran) {
                                    $query->where('tahun_ajaran', $tahunAjaran);
                                });
                        })
                        ->get();

                    //semua id mahasiswa unik
                    $penilaian->each(function ($detailPenilaian) use ($uniqueRespondents) {
                        $uniqueRespondents->push($detailPenilaian->penilaianKinerja->krs->mahasiswa_id);
                    });

                    // Hitung total skor untuk subkriteria ini
                    $totalSubCriterionScore = $penilaian->sum(function ($detailPenilaian) {
                        return SkalaPenilaian::find($detailPenilaian->skala_id)->nilai;
                    });

                    // Hitung rata-rata nilai untuk subkriteria ini
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
            $dosenData['classification'] = $this->classifyIKD($totalIKD);
            $dosenData['total_respondents'] = $uniqueRespondents->unique()->count();

            $penilaianByTahunAjaran->put($tahunAjaran, $dosenData);
        }

        $penilaianByTahunAjaran = $penilaianByTahunAjaran->sortKeysDesc();

        return view('admin.IKD.detailikd', compact('penilaianByTahunAjaran', 'criteria', 'tahunAjaranList'));
    }


    private function classifyIKD($ikd)
    {
        $badgeClass = '';
        $badgeText = '';

        if ($ikd >= 4.01 && $ikd <= 5.00) {
            $badgeClass = 'bg-lightprimary text-primary dark:bg-darkprimary dark:text-primary';
            $badgeText = 'Sangat Baik (Standar Minimal Kinerja Selalu Tercapai Lebih)';
        } elseif ($ikd >= 3.01 && $ikd < 4.00) {
            $badgeClass = 'bg-lightsuccess text-success dark:bg-darksuccess dark:text-success';
            $badgeText = 'Baik (Standar Minimal Kinerja Tercapai Lebih)';
        } elseif ($ikd >= 2.01 && $ikd < 3.00) {
            $badgeClass = 'bg-lightwarning text-warning dark:bg-darkwarning dark:text-warning';
            $badgeText = 'Standar (Standar Minimal Kinerja Tercapai)';
        } elseif ($ikd >= 1.01 && $ikd < 2.00) {
            $badgeClass = 'bg-lighterror text-error dark:bg-darkerror dark:text-error';
            $badgeText = 'Kurang (Standar Minimal Kinerja Tercapai Sebagian)';
        } elseif ($ikd >= 0.01 && $ikd < 1.00) {
            $badgeClass = 'bg-lighterror text-error dark:bg-darkerror dark:text-error';
            $badgeText = 'Sangat Kurang (Standar Minimal Kinerja Tidak Tercapai)';
        } else {
            $badgeClass = 'bg-lightgray text-dark dark:bg-darkborder dark:text-lightgray';
            $badgeText = 'Belum Diisi (Menunggu Jawaban Responden)';
        }

        return [
            'badgeClass' => 'inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium ' . $badgeClass,
            'badgeText' => $badgeText,
        ];
    }


    // private function classifyIKD($ikd)
    // {

    //     $badgeClass = '';
    //     $badgeText = '';
    //     if ($ikd >= 4.01 && $ikd <= 5.00) {
    //         $badgeClass = 'inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full  text-xs font-medium bg-lightprimary text-primary dark:bg-darkprimary dark:text-primary';
    //         $badgeText = 'Sangat Baik (Standar Minimal Kinerja Selalu Tercapai Lebih)';
    //     } elseif ($ikd >= 3.01 && $ikd < 4.00) {
    //         $badgeClass = 'inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full  text-xs font-medium bg-lightsuccess text-success dark:bg-darksuccess dark:text-success';
    //         $badgeText = 'Baik (Standar Minimal Kinerja Tercapai Lebih)';
    //     } elseif ($ikd >= 2.01 && $ikd < 3.00) {
    //         $badgeClass = 'inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full  text-xs font-medium bg-lightwarning text-warning dark:bg-darkwarning dark:text-warning';
    //         $badgeText = 'Standar (Standar Minimal Kinerja Tercapai)';
    //     } elseif ($ikd >= 1.01 && $ikd < 2.00) {
    //         $badgeClass = 'inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full  text-xs font-medium bg-lighterror text-error dark:bg-darkerror dark:text-error';
    //         $badgeText = 'Kurang (Standar Minimal Kinerja Tercapai Sebagian)';
    //     } elseif ($ikd >= 0.01 && $ikd < 1.00) {
    //         $badgeClass = 'bg-lighterror text-error dark:bg-darkerror dark:text-error';
    //         $badgeText = 'Sangat Kurang (Standar Minimal Kinerja Tidak Tercapai)';
    //     } else {
    //         $badgeClass = 'inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full  text-xs font-medium bg-lightgray text-dark dark:bg-darkborder dark:text-lightgray';
    //         $badgeText = 'Belum Diisi (Menunggu Jawaban Responden)';
    //     }

    //     return [
    //         'badgeClass' => $badgeClass,
    //         'badgeText' => $badgeText,
    //     ];

    // }


    // private function classifyIKD($ikd)
    // {
    //     if ($ikd >= 4.00 && $ikd <= 5.00) {
    //         return 'Sangat Baik (Standar Minimal Kinerja Selalu Tercapai Lebih)';
    //     } elseif ($ikd >= 3.00 && $ikd < 4.00) {
    //         return 'Baik (Standar Minimal Kinerja Tercapai Lebih)';
    //     } elseif ($ikd >= 2.00 && $ikd < 3.00) {
    //         return 'Standar (Standar Minimal Kinerja Tercapai)';
    //     } elseif ($ikd >= 1.00 && $ikd < 2.00) {
    //         return 'Kurang (Standar Minimal Kinerja Tercapai Sebagian)';
    //     } elseif ($ikd >= 0.01 && $ikd < 1.00) {
    //         return 'Sangat Kurang (Standar Minimal Kinerja Tidak Tercapai)';
    //     } else {
    //         return 'Belum Diisi (Menunggu Jawaban Responden)';
    //     }
    // }


//     private function classifyIKD($ikd)
// {
//     $klasifikasi = Klasifikasi::where('nilai_min', '<=', $ikd)
//     ->where('nilai_max', '>=', $ikd)
//     ->first();

// if ($klasifikasi) {
//     return [
//         'hasil_klasifikasi' => $klasifikasi->hasil_klasifikasi,
//         'keterangan' => $klasifikasi->keterangan,
//     ];
// } else {
//     return [
//         'hasil_klasifikasi' => null,
//         'keterangan' => null,
//     ];
// }

// }
}
// public function index(Request $request)
// {
//     // Ambil tahun ajaran terbaru
//     $tahunAjaranTerbaru = Kelas::max('tahun_ajaran');

//     // Ambil list fakultas, prodi, dan tahun ajaran
//     $criteria = Kriteria::all();
//     $fakultasList = Fakultas::all();
//     $prodiList = Prodi::all();
//     $tahunAjaranList = Kelas::distinct('tahun_ajaran')->pluck('tahun_ajaran');

//     // Jika tidak ada tahun ajaran yang dipilih, ambil data untuk tahun ajaran terbaru
//     if (!$request->filled('tahun_ajaran')) {
//         $request->merge(['tahun_ajaran' => $tahunAjaranTerbaru]);
//     }

//     // Data yang dipilih
//     $selectedTahunAjaran = $request->input('tahun_ajaran');
//     $selectedFakultasId = $request->input('fakultas_id');
//     $selectedProdiId = $request->input('prodi_id');

//     // Pagination
//     $itemsPerPage = $request->get('items_per_page', 5);

//     // Panggil method showPenilaian untuk mendapatkan data penilaian dengan pagination
//     $penilaianQuery = $this->showPenilaian($request);

//     // Paginasi data penilaian
//     $paginatedDosen = $penilaianQuery
//         ->paginate($itemsPerPage)
//         ->appends([
//             'tahun_ajaran' => $selectedTahunAjaran,
//             'fakultas_id' => $selectedFakultasId,
//             'prodi_id' => $selectedProdiId,
//             'items_per_page' => $itemsPerPage
//         ]);

//     // Lakukan pengolahan data penilaian sesuai kebutuhan
//     $penilaianData = $this->processPenilaianData($paginatedDosen, $criteria, $selectedTahunAjaran);

//     return view('admin.IKD.ikd', compact('criteria', 'fakultasList', 'prodiList', 'tahunAjaranList', 'penilaianData', 'selectedTahunAjaran', 'selectedFakultasId', 'selectedProdiId', 'itemsPerPage'));
// }

// private function processPenilaianData($paginatedDosen, $criteria, $tahunAjaran)
// {
//     $penilaianData = [];

//     foreach ($paginatedDosen as $dosen) {
//         $dosenData = [
//             'dosen' => $dosen,
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
//                     ->whereHas('penilaianKinerja', function ($query) use ($dosen, $tahunAjaran) {
//                         $query->where('dosen_id', $dosen->dosen_id)
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

//     return new LengthAwarePaginator(
//         $penilaianData,
//         $paginatedDosen->total(),
//         $paginatedDosen->perPage(),
//         $paginatedDosen->currentPage(),
//         ['path' => request()->url(), 'query' => request()->query()]
//     );
// }



//     private function showPenilaian(Request $request)
//     {
//         $tahunAjaran = $request->input('tahun_ajaran');
//         $dosenQuery = Dosen::query();

//         if ($request->filled('fakultas_id')) {
//             $dosenQuery->whereHas('prodi', function($query) use ($request) {
//                 $query->where('fakultas_id', $request->fakultas_id);
//             });
//         }

//         // Filter berdasarkan prodi
//         if ($request->filled('prodi_id')) {
//             $dosenQuery->where('prodi_id', $request->prodi_id);
//         }

//         // Filter berdasarkan tahun ajaran
//         $dosenQuery->whereHas('krs.kelas', function ($query) use ($tahunAjaran) {
//             $query->where('tahun_ajaran', $tahunAjaran);
//         });

//         return $dosenQuery;
//     }



