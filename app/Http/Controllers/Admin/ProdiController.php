<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $itemsPerPage = $request->get('items_per_page', 5);
        $prodi = Prodi::with(['fakultas'])->paginate($itemsPerPage);
        $prodi->appends(['items_per_page' => $itemsPerPage]);

        // dd($prodi);
        return view ('admin.akademik.get.prodi', compact('prodi','itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $fakultas = Fakultas::All();
        return view ('admin.akademik.post.addprodi', compact('fakultas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_prodi' => 'required',
            'fakultas_id' => 'required',
        ]);
        $data= [
            'nama_prodi' => $request->nama_prodi,
            'fakultas_id' => $request->fakultas_id,
        ];

        // dd($data);
        Prodi::create($data);
        Alert::success('Data Prodi Berhasil Ditambahkan', 'success');
        // Alert::toast('Data has been saved successfully', 'success');
        return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $prodi = Prodi::findOrFail($id);
        $fakultas = Fakultas::all();
        return view ('admin.akademik.put.editprodi', compact('fakultas', 'prodi'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_prodi' => 'required',
            'fakultas_id' => 'required',
        ]);
        $data= [
            'nama_prodi' => $request->nama_prodi,
            'fakultas_id' => $request->fakultas_id,
        ];

        $prodi = Prodi::findOrFail($id);

        $prodi->update($data);
        Alert::success('Data Prodi Berhasil Diperbarui', 'success');
        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //

        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        Alert::info('Data Admin Berhasil Dihapus', 'success');
        return redirect()->route('prodi.index');
    }
}
