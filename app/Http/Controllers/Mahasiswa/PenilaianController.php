<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Models\Penilaian;
use App\Models\KritikSaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenilaianController extends Controller
{
    //
    public function storeKritikSaran(Request $request, $penilaian_id)
    {
        $mahasiswa_id = auth()->user()->mahasiswa->mahasiswa_id;
        $dosen_id = Penilaian::find($penilaian_id)->dosen_id;

        KritikSaran::create([
            'penilaian_id' => $penilaian_id,
            'mahasiswa_id' => $mahasiswa_id,
            'dosen_id' => $dosen_id,
            'kritik' => $request->input('kritik'),
            'saran' => $request->input('saran')
        ]);

        return redirect()->route('kuisioner.result', ['penilaian_id' => $penilaian_id])->with('success', 'Kritik dan saran berhasil disimpan');
    }
}
