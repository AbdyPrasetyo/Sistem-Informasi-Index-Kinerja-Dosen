<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $itemsPerPage = $request->get('items_per_page', 5);
        $fakultas = Fakultas::paginate($itemsPerPage);
        $fakultas->appends(['items_per_page' => $itemsPerPage]);
        return view ('admin.akademik.get.fakultas', compact('fakultas','itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.akademik.post.addfakultas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_fakultas' => 'required|string|max:255|unique:fakultas,nama_fakultas',
        ]);



        $data= [
            'nama_fakultas' => $request->nama_fakultas,
        ];

        Fakultas::create($data);
        // Alert::toast('Data has been saved successfully', 'success');
        Alert::success('Data Fakultas Berhasil Ditambahkan', 'success');
        return redirect()->route('fakultas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fakultas = Fakultas::findOrFail($id);
        return view ('admin.akademik.put.editfakultas', compact('fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_fakultas' => 'required|string|max:255|unique:fakultas,nama_fakultas',
        ]);



        $data= [
            'nama_fakultas' => $request->nama_fakultas,
        ];

        $Fakultas = Fakultas::findOrFail($id);

        $Fakultas->update($data);

        Alert::success('Data Fakultas Admin Berhasil Diperbarui', 'success');
        return redirect()->route('fakultas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();
        Alert::info('Data Admin Berhasil Dihapus', 'success');
        return redirect()->route('fakultas.index');
    }
}
