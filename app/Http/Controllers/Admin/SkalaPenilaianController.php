<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\SkalaPenilaian;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SkalaPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $itemsPerPage = $request->get('items_per_page', 5);
        $skala = SkalaPenilaian::paginate($itemsPerPage);
        $skala->appends(['items_per_page' => $itemsPerPage]);
        return view ('admin.kuisioner.get.skala_penilaian', compact('skala', 'itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('admin.kuisioner.post.addskala');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kategori' => 'required',
            'nilai' => 'required|numeric',
        ]);



        $data= [
            'kategori' => $request->kategori,
            'nilai' => $request->nilai,
        ];

        SkalaPenilaian::create($data);
        Alert::success('Data skala Berhasil Ditambahkan', 'success');
        // Alert::toast('Data has been saved successfully', 'success');
        return redirect()->route('skala.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SkalaPenilaian $skalaPenilaian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $skala = SkalaPenilaian::findOrFail($id);
        return view ('admin.kuisioner.put.editskala', compact('skala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'kategori' => 'required',
            'nilai' => 'required|numeric',

        ]);

        $data = [
            'kategori' => $request->kategori,
            'nilai' => $request->nilai,

        ];

        $skala = SkalaPenilaian::findOrFail($id);

        $skala->update($data);
        Alert::success('Data skala Berhasil Diperbarui', 'success');
        return redirect()->route('skala.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $skala = SkalaPenilaian::findOrFail($id);
        $skala->delete();
        Alert::info('Data skala Berhasil Dihapus', 'success');
        return redirect()->route('skala.index');
    }
}
