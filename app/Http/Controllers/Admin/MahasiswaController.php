<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $itemsPerPage = $request->get('items_per_page', 10);
        $mahasiswa = Mahasiswa::with(['user', 'prodi'])->paginate($itemsPerPage);
        $mahasiswa->appends(['items_per_page' => $itemsPerPage]);
        return view ('admin.master_data.get.datamahasiswa', compact('mahasiswa', 'itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $prodi = Prodi::All();
        return view ('admin.master_data.post.addmahasiswa', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'nim' => 'required|string|max:255|unique:mahasiswa,nim',
            'nama_lengkap' => 'required|string|max:255',
            'prodi_id' => 'required|integer',
            'gender' => 'required|string|max:10',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'status_mahasiswa' => 'required|string|max:50',
            'alamat' => 'required|string|max:500',
            'angkatan' => 'required|integer',
            'telepon' => 'required|string|max:20',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 3
            ]);

            Mahasiswa::create([
                'user_id' => $user->user_id,
                'nim' => $request->nim,
                'nama_lengkap' => $request->nama_lengkap,
                'prodi_id' => $request->prodi_id,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'status_mahasiswa' => $request->status_mahasiswa,
                'alamat' => $request->alamat,
                'angkatan' => $request->angkatan,
                'telepon' => $request->telepon,
            ]);
        });
        Alert::success('Data Mahasiswa Berhasil Ditambahkan', 'success');
        // Redirect to a specific route with a success message
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $mahasiswa = Mahasiswa::find($id);
        $user = User::findOrFail($mahasiswa->user_id);
        $prodi = Prodi::All();
        return view ('admin.master_data.put.editmahasiswa', compact('mahasiswa','prodi', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    $mahasiswa = Mahasiswa::findOrFail($id);

    $user = User::findOrFail($mahasiswa->user_id);
        $request->validate([
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->user_id, 'user_id'),],
            // 'email' => 'required|email|unique:users,email,' . $id . ',user_id',
            'nim' => 'required|unique:mahasiswa,nim,' . $id . ',mahasiswa_id',
            'name' => 'required',
            'password' => 'nullable|string|min:8',
            'nama_lengkap' => 'required',
            'prodi_id' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
            'status_mahasiswa' => 'required',
            'alamat' => 'required',
            'angkatan' => 'required|digits:4',
            'telepon' => 'required',
        ]);

        DB::transaction(function () use ($request, $id) {
            $mahasiswa = Mahasiswa::find($id);
            $user = User::find($mahasiswa->user_id);

            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            $mahasiswa->nim = $request->nim;
            $mahasiswa->nama_lengkap = $request->nama_lengkap;
            $mahasiswa->prodi_id = $request->prodi_id;
            $mahasiswa->gender = $request->gender;
            $mahasiswa->tempat_lahir = $request->tempat_lahir;
            $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
            $mahasiswa->agama = $request->agama;
            $mahasiswa->status_mahasiswa = $request->status_mahasiswa;
            $mahasiswa->alamat = $request->alamat;
            $mahasiswa->angkatan = $request->angkatan;
            $mahasiswa->telepon = $request->telepon;
            $mahasiswa->save();
        });
        Alert::success('Data Mahasiswa Berhasil Diperbarui', 'success');
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        if ($mahasiswa->user) {
            $mahasiswa->user->delete();
        }

        Alert::info('Data Admin Berhasil Dihapus', 'success');
         return redirect()->route('mahasiswa.index');
    }
}
