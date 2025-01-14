<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prodi;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $itemsPerPage = $request->get('items_per_page', 10);
        $matkul = MataKuliah::with(['prodi'])->paginate($itemsPerPage);
        $matkul->appends(['items_per_page' => $itemsPerPage]);
        $prodi = Prodi::All();
        return view ('admin.akademik.get.matakuliah', compact('matkul', 'prodi','itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $prodi = Prodi::All();
        return view ('admin.akademik.post.addmatkul', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kode_matakuliah' => 'required|string|max:255|unique:matakuliah,kode_matakuliah',
            'nama_matakuliah' => 'required|string|max:255',
            'sks'              => 'required|numeric',
            'semester'          => 'required|numeric',
            'prodi_id'              => 'required|numeric',
        ]);



        $data= [
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks,
            'semester' => $request->semester,
            'prodi_id' => $request->prodi_id,
        ];

        MataKuliah::create($data);
        // Alert::toast('Data has been saved successfully', 'success');
        Alert::success('Data Matakuliah Berhasil Ditambahkan', 'success');
        return redirect()->route('matkul.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MataKuliah $mataKuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $matkul = MataKuliah::findOrFail($id);
        $prodi = Prodi::All();
        return view ('admin.akademik.put.editmatkul', compact('prodi', 'matkul'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_matakuliah' => 'required|string|max:255|unique:matakuliah,kode_matakuliah,' . $id . ',matakuliah_id',
            'nama_matakuliah' => 'required|string|max:255',
            'sks'              => 'required|numeric',
            'semester'          => 'required|numeric',
            'prodi_id'              => 'required|numeric',
        ]);

        $data = [
            'kode_matakuliah' => $request->kode_matakuliah,
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks,
            'semester' => $request->semester,
            'prodi_id' => $request->prodi_id,
        ];

        $matakuliah = MataKuliah::findOrFail($id);

        $matakuliah->update($data);
        Alert::success('Data Admin Berhasil Diperbarui', 'success');
        return redirect()->route('matkul.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $matkul = MataKuliah::findOrFail($id);
        $matkul->delete();
        Alert::info('Data Admin Berhasil Dihapus', 'success');
        return redirect()->route('matkul.index');
    }
}
