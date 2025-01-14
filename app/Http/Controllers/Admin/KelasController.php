<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $itemsPerPage = $request->get('items_per_page', 10);
        $kelas = Kelas::with(['matkul', 'dosen'])->paginate($itemsPerPage);
        $kelas->appends(['items_per_page' => $itemsPerPage]);
        return view ('admin.akademik.get.kelas', compact('kelas','itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dosen = Dosen::All();
        $matkul = MataKuliah::All();
        return view ('admin.akademik.post.addkelas', compact('dosen', 'matkul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'matakuliah_id' => 'required',
            'dosen_id' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        $data= [
            'matakuliah_id' => $request->matakuliah_id,
            'dosen_id' => $request->dosen_id,
            'tahun_ajaran' => $request->tahun_ajaran,
        ];

        Kelas::create($data);
        // Alert::toast('Data has been saved successfully', 'success');
        Alert::success('Data Kelas Berhasil Ditambahkan', 'success');
        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $kelas = Kelas::findOrFail($id);
        $dosen = Dosen::All();
        $matkul = MataKuliah::All();
        return view ('admin.akademik.put.editkelas', compact('dosen', 'matkul', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'matakuliah_id' => 'required',
            'dosen_id' => 'required',
            'tahun_ajaran' => 'required',

        ]);

        $data = [
            'matakuliah_id' => $request->matakuliah_id,
            'dosen_id' => $request->dosen_id,
            'tahun_ajaran' => $request->tahun_ajaran,

        ];

        $kelas = Kelas::findOrFail($id);

        $kelas->update($data);
        Alert::success('Data Kelas Berhasil Diperbarui', 'success');
        return redirect()->route('kelas.index');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $kelas = Kelas::findOrFail($id);
        $kelas->delete();
        Alert::info('Data Kelas Berhasil Dihapus', 'success');
        return redirect()->route('kelas.index');
    }
}
