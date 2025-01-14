<?php

namespace App\Http\Controllers\Dosen;

use App\Models\KRS;
use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Models\SkalaPenilaian;
use App\Models\DetailPenilaian;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DosenResultController extends Controller
{
    public function resultikd()
    {

        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $loggedInUser = Auth::user();

        // Pastikan pengguna yang masuk adalah dosen
        if (!$loggedInUser->isDosen()) {
            // Redirect atau tangani jika pengguna bukan dosen
            return redirect()->route('unauthorized');
        }

        $dosenId = $loggedInUser->dosen->dosen_id;
        // $tahunAjaranList = Kelas::distinct('tahun_ajaran')->pluck('tahun_ajaran');

        // dd($dosenId);

        // Ambil semua kriteria
        $criteria = Kriteria::all();

        $penilaianData = [];
        $totalIKD = 0;

        foreach ($criteria as $criterion) {
            $subCriteria = $criterion->subKriteria;
            $totalSubCriteriaScore = 0;
            $totalRespondents = 0;

            foreach ($subCriteria as $subCriterion) {
                $penilaian = DetailPenilaian::where('subkriteria_id', $subCriterion->subkriteria_id)
                    ->whereHas('penilaianKinerja', function ($query) use ($dosenId) {
                        $query->where('dosen_id', $dosenId);
                    })
                    ->get();

                $averageScore = $penilaian->avg(function ($detailPenilaian) {
                    return SkalaPenilaian::find($detailPenilaian->skala_id)->nilai;
                });

                $totalSubCriteriaScore += $averageScore * $penilaian->count();
                $totalRespondents += $penilaian->count();
            }

            $averageSubCriteriaScore = $totalRespondents > 0 ? $totalSubCriteriaScore / $totalRespondents : 0;
            $totalCriterionScore = $averageSubCriteriaScore * ($criterion->bobot / 100);

            $penilaianData[] = [
                'kriteria' => $criterion->nama_kriteria,
                'average_score' => $averageSubCriteriaScore,
                'total_score' => $totalCriterionScore,
                'respondent_count' => $totalRespondents
            ];

            $totalIKD += $totalCriterionScore;
        }

        $classification = $this->classifyIKD($totalIKD);

        return view('dosen.ikddosen',  compact('penilaianData', 'criteria', 'totalIKD', 'classification'));

    }



    public function ikdDosen()
{
    // Pastikan pengguna sudah masuk
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $loggedInUser = Auth::user();

    // Pastikan pengguna yang masuk adalah dosen
    if (!$loggedInUser->isDosen()) {
        // Redirect atau tangani jika pengguna bukan dosen
        return redirect()->route('unauthorized');
    }

    // Ambil dosen_id dari pengguna yang login
    $dosenId = $loggedInUser->dosen->dosen_id;

    // Ambil semua tahun ajaran yang tersedia
    $tahunAjaranList = Kelas::distinct('tahun_ajaran')->pluck('tahun_ajaran');

    // Ambil semua kriteria beserta subkriteria mereka
    $criteria = Kriteria::with('subKriteria')->get();

    // Inisialisasi koleksi untuk menyimpan data penilaian berdasarkan tahun ajaran
    $penilaianByTahunAjaran = collect();

    foreach ($tahunAjaranList as $tahunAjaran) {
        // Inisialisasi data dosen per tahun ajaran
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
                // Ambil penilaian subkriteria berdasarkan tahun ajaran
                $penilaian = DetailPenilaian::where('subkriteria_id', $subCriterion->subkriteria_id)
                    ->whereHas('penilaianKinerja', function ($query) use ($dosenId, $tahunAjaran) {
                        $query->where('dosen_id', $dosenId)
                            ->whereHas('krs.kelas', function ($query) use ($tahunAjaran) {
                                $query->where('tahun_ajaran', $tahunAjaran);
                            });
                    })
                    ->get();

                // Kumpulkan semua id mahasiswa unik
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

    return view('dosen.ikddosen', compact('penilaianByTahunAjaran', 'criteria', 'tahunAjaranList'));
}




    private function classifyIKD($ikd)
    {

        $badgeClass = '';
        $badgeText = '';
        if ($ikd >= 4.01 && $ikd <= 5.00) {
            $badgeClass = 'bg-lightprimary text-primary dark:bg-darksuccess dark:text-primary';
            $badgeText = 'Sangat Baik (Standar Minimal Kinerja Selalu Tercapai Lebih)';
        } elseif ($ikd >= 3.01 && $ikd < 4.00) {
            $badgeClass = 'bg-lightprimary text-primary dark:bg-darkprimary dark:text-primary';
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
            $badgeClass = 'bg-gray-300 text-gray-600 dark:bg-gray-700 dark:text-gray-400';
            $badgeText = 'Belum Diisi (Menunggu Jawaban Responden)';
        }

        return [
            'badgeClass' => $badgeClass,
            'badgeText' => $badgeText,
        ];

    }



    public function kritik()
    {
        // Mengambil dosen yang sedang login
        $loggedInDosen = Auth::user();
        if ($loggedInDosen && $loggedInDosen->dosen) {
            $dosen = $loggedInDosen->dosen;

            // Mengambil semua penilaian kinerja yang terkait dengan dosen tersebut
            $penilaianKinerja = $dosen->penilaian()->get();

            $kritikSaranList = [];

            // Iterasi semua penilaian kinerja
            foreach ($penilaianKinerja as $penilaian) {
                $kritikSaran = $penilaian->kritikSaran;
                if ($kritikSaran) {
                    $kritikSaranList[] = [
                        'penilaian_id' => $penilaian->penilaian_id,
                        'kritik' => $kritikSaran->kritik,
                        'saran' => $kritikSaran->saran,
                    ];
                }
            }

            $jumlahKritikSaran = count($kritikSaranList);

            $dosenId = $loggedInDosen->dosen->dosen_id;
            $totalMataKuliah = Kelas::where('dosen_id', $dosenId)
                                ->count();

            $kelas = Kelas::where('dosen_id', $dosenId)
                            ->with('matkul')
                            ->get();


            $jumlahMahasiswa = Kelas::where('dosen_id', $dosenId)
                        ->with('krs.mahasiswa','krs.mahasiswa')
                        ->get()
                        ->flatMap(function ($kelas) {
                            return $kelas->krs->pluck('mahasiswa');
                        })
                        ->unique('mahasiswa_id')
                        ->count();




            return view('dosen.kritik-saran', compact('kritikSaranList', 'jumlahKritikSaran', 'totalMataKuliah','kelas', 'jumlahMahasiswa'));
        }

        // Jika tidak ada dosen yang sedang login
        return redirect()->route('login')->with('error', 'Silakan login untuk mengakses kritik dan saran.');
    }



    public function getMahasiswa()
    {
        // Ambil ID dosen yang sedang login
        $dosenId = Auth::user()->user_id;

        // Cari data dosen berdasarkan user_id
        $dosen = Dosen::where('user_id', $dosenId)->first();

        if (!$dosen) {
            return response()->json(['message' => 'Dosen tidak ditemukan'], 404);
        }

        // Ambil semua kelas yang diajar oleh dosen
        $kelas = $dosen->kelas()->with('krs.mahasiswa')->get();

        // Ambil data mahasiswa dari kelas
        $mahasiswa = [];
        foreach ($kelas as $kls) {
            foreach ($kls->krs as $krs) {
                $mahasiswa[] = $krs->mahasiswa;
            }
        }

        // dd($mahasiswa);

        return response()->json($mahasiswa);
    }
}
