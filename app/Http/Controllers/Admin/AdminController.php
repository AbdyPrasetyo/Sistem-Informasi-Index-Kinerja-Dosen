<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $itemsPerPage = $request->get('items_per_page', 5);
        $admin = Admin::with(['user'])->paginate($itemsPerPage);
        $admin->appends(['items_per_page' => $itemsPerPage]);
        return view ('admin.master_data.get.dataadmin', compact('admin', 'itemsPerPage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('admin.master_data.post.addadmin');
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
            'nip' => 'required|string|max:255|unique:admin,nip',
            'nama_lengkap' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'status_admin' => 'required|string|max:50',
            'alamat' => 'required|string|max:500',
            'telepon' => 'required|string|max:20',
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 1
            ]);

            Admin::create([
                'user_id' => $user->user_id,
                'nip' => $request->nip,
                'nama_lengkap' => $request->nama_lengkap,
                'gender' => $request->gender,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'status_admin' => $request->status_admin,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
            ]);
        });

        // Redirect to a specific route with a success message
        Alert::success('Data Admin Berhasil Ditambahkan', 'success');
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        $user = User::findOrFail($admin->user_id);
        return view ('admin.master_data.put.editadmin', compact('admin', 'user'));  //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        $admin = Admin::findOrFail($id);
        $user = User::findOrFail($admin->user_id);
        $request->validate([
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->user_id, 'user_id'),],
            // 'email' => 'required|email|unique:users,email,' . $id . ',user_id',
            'nip' => 'required|unique:admin,nip,' . $id . ',admin_id',
            'name' => 'required',
            'password' => 'nullable|string|min:8|confirmed',
            'nama_lengkap' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
            'status_admin' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        DB::transaction(function () use ($request, $id) {
            $admin = Admin::find($id);
            $user = User::find($admin->user_id);

            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            $admin->nip = $request->nip;
            $admin->nama_lengkap = $request->nama_lengkap;
            $admin->gender = $request->gender;
            $admin->tempat_lahir = $request->tempat_lahir;
            $admin->tanggal_lahir = $request->tanggal_lahir;
            $admin->agama = $request->agama;
            $admin->status_admin = $request->status_admin;
            $admin->alamat = $request->alamat;
            $admin->telepon = $request->telepon;
            $admin->save();
        });
        Alert::success('Data Admin Berhasil Diperbarui', 'success');
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $admin = Admin::findOrFail($id);
        $admin->delete();
        if ($admin->user) {
            $admin->user->delete();
        }

         Alert::info('Data admin berhasil dihapus', 'success');
         return redirect()->route('admin.index');
    }
}
