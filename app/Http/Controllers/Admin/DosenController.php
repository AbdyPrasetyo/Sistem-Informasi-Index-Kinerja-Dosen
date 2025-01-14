<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $itemsPerPage = $request->get('items_per_page', 5);
        $dosen = Dosen::with(['user', 'prodi'])->paginate($itemsPerPage);
        $dosen->appends(['items_per_page' => $itemsPerPage]);
        return view ('admin.master_data.get.datadosen', compact('dosen','itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $prodi = Prodi::All();
        return view ('admin.master_data.post.adddosen', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'nidn' => 'required|string|max:255|unique:dosen,nidn',
            'nama_lengkap' => 'required|string|max:255',
            'prodi_id' => 'required|integer',
            'gender' => 'required|string|max:10',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'status_dosen' => 'required|string|max:50',
            'alamat' => 'required|string|max:500',
            'telepon' => 'required|string|max:20',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 2
            ]);

            Dosen::create([
                'user_id' => $user->user_id,
                'nidn' => $request->nidn,
                'nama_lengkap' => $request->nama_lengkap,
                'prodi_id' => $request->prodi_id,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'status_dosen' => $request->status_dosen,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
            ]);
        });

        Alert::success('Data Dosen Berhasil Ditambahkan', 'success');
        return redirect()->route('dosen.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $dosen = Dosen::find($id);
        $user = User::findOrFail($dosen->user_id);
        $prodi = Prodi::All();
        return view ('admin.master_data.put.editdosen', compact('dosen','prodi', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $dosen = Dosen::findOrFail($id);
        $user = User::findOrFail($dosen->user_id);
        $request->validate([
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->user_id, 'user_id'),],
            // 'email' => 'required|email|unique:users,email,' . $id . ',user_id',
            'nidn' => 'required|unique:dosen,nidn,' . $id . ',dosen_id',
            'name' => 'required',
            'password' => 'nullable|string|min:8|confirmed',
            'nama_lengkap' => 'required',
            'prodi_id' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
            'status_dosen' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        DB::transaction(function () use ($request, $id) {
            $dosen = Dosen::find($id);
            $user = User::find($dosen->user_id);

            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            $dosen->nidn = $request->nidn;
            $dosen->nama_lengkap = $request->nama_lengkap;
            $dosen->prodi_id = $request->prodi_id;
            $dosen->gender = $request->gender;
            $dosen->tempat_lahir = $request->tempat_lahir;
            $dosen->tanggal_lahir = $request->tanggal_lahir;
            $dosen->agama = $request->agama;
            $dosen->status_dosen = $request->status_dosen;
            $dosen->alamat = $request->alamat;
            $dosen->telepon = $request->telepon;
            $dosen->save();
        });
         Alert::success('Data Dosen Berhasil Diperbarui', 'success');
        return redirect()->route('dosen.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        if ($dosen->user) {
            $dosen->user->delete();
        }

 Alert::info('Data Dosen Berhasil Dihapus', 'success');
         return redirect()->route('dosen.index');
    }
}
