<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $itemsPerPage = $request->get('items_per_page', 5);
        $kriteria = Kriteria::paginate($itemsPerPage);
        $kriteria->appends(['items_per_page' => $itemsPerPage]);
        return view ('admin.kuisioner.get.kriteria',compact('kriteria','itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('admin.kuisioner.post.addkriteria');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_kriteria' => 'required|unique:kriteria,nama_kriteria',
        ]);



        $data= [
            'nama_kriteria' => $request->nama_kriteria,
        ];

        Kriteria::create($data);
        $this->updateWeights();
        Alert::success('Data Kriteria Berhasil Ditambahkan', 'success');
        // Alert::toast('Data has been saved successfully', 'success');
        return redirect()->route('kriteria.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $kriteria = Kriteria::findOrFail($id);
        return view ('admin.kuisioner.put.editkriteria', compact('kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nama_kriteria' => 'required',
        ]);

        $data= [
            'nama_kriteria' => $request->nama_kriteria,
        ];
        $kriteria = Kriteria::findOrFail($id);
        $kriteria->update($data);
        Alert::success('Data Kriteria Berhasil Diperbarui', 'success');
        // Alert::toast('Data has been saved successfully', 'success');
        return redirect()->route('kriteria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $kriteria = Kriteria::findOrFail($id);
        if ($kriteria) {
            $kriteria->delete();
            $this->updateWeights(); // Update weights after deleting criterion
        }

        Alert::info('Data Admin Berhasil Dihapus', 'success');
        return redirect()->route('kriteria.index');
    }


    public function updateWeights()
    {
        $criteria = Kriteria::all();
        $totalCriteria = $criteria->count();

        if ($totalCriteria > 0) {
            $weightPerCriteria = 100 / $totalCriteria;

            foreach ($criteria as $criterion) {
                $criterion->bobot = $weightPerCriteria;
                $criterion->save();
            }
        }
    }
}
