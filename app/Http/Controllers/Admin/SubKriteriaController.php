<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $itemsPerPage = $request->get('items_per_page', 5);
        $subkriteria = SubKriteria::with(['kriteria'])->paginate($itemsPerPage);
        $subkriteria->appends(['items_per_page' => $itemsPerPage]);
        return view ('admin.kuisioner.get.subkriteria', compact('subkriteria', 'itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kriteria = Kriteria::All();
        return view ('admin.kuisioner.post.addsubkriteria', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kriteria_id' => 'required',
            'nama_subkriteria' => 'required',
        ]);



        $data= [
            'kriteria_id' => $request->kriteria_id,
            'nama_subkriteria' => $request->nama_subkriteria,
        ];

        SubKriteria::create($data);
        Alert::success('Data Admin Berhasil Ditambahkan', 'success');
        // Alert::toast('Data has been saved successfully', 'success');
        return redirect()->route('subkriteria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubKriteria $subKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $subkriteria = SubKriteria::findOrFail($id);
        $kriteria = Kriteria::All();
        return view ('admin.kuisioner.put.editsubkriteria', compact('subkriteria','kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //

        $request->validate([
            'kriteria_id' => 'required',
            'nama_subkriteria' => 'required',
        ]);

        $data= [
            'kriteria_id' => $request->kriteria_id,
            'nama_subkriteria' => $request->nama_subkriteria,
        ];
        $subkriteria = SubKriteria::findOrFail($id);
        $subkriteria->update($data);
        Alert::success('Data Admin Berhasil Diperbarui', 'success');
        // Alert::toast('Data has been saved successfully', 'success');
        return redirect()->route('subkriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $subkriteria = SubKriteria::findOrFail($id);
        $subkriteria->delete();
        Alert::info('Data Admin Berhasil Dihapus', 'success');
        return redirect()->route('subkriteria.index');
    }
}
