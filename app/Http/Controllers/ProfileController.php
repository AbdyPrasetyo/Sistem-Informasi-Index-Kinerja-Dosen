<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }


    public function update(Request $request)
    {
        $user = Auth::user();
        $role = $user->role;

        // Validasi umum untuk user
        $request->validate([
            'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users,email,' . $user->user_id,
        ]);

        // Update data user umum
        $user->update($request->only('name', 'email'));

        // Validasi dan update data spesifik berdasarkan role
        if ($role == '2') {
            $request->validate([
                // 'nidn' => 'required|string|max:20',
                'nama_lengkap' => 'required|string|max:255',
                // 'prodi_id' => 'required|integer',
                'gender' => 'required|string|max:10',
                'tempat_lahir' => 'required|string|max:100',
                'tanggal_lahir' => 'required|date',
                'agama' => 'required|string|max:50',
                // 'status_dosen' => 'required|string|max:50',
                'alamat' => 'required|string|max:255',
                'telepon' => 'required|string|max:15',
            ]);

            $user->dosen()->update($request->only(
                'nama_lengkap', 'gender', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat', 'telepon'
            ));
        } elseif ($role == '1') {
            $request->validate([
                // 'nip' => 'required|string|max:20',
                'nama_lengkap' => 'required|string|max:255',
                'gender' => 'required|string|max:10',
                'tempat_lahir' => 'required|string|max:100',
                'tanggal_lahir' => 'required|date',
                'agama' => 'required|string|max:50',
                // 'status_admin' => 'required|string|max:50',
                'alamat' => 'required|string|max:255',
                'telepon' => 'required|string|max:15',
            ]);

            $user->admin()->update($request->only(
                 'nama_lengkap', 'gender', 'tempat_lahir', 'tanggal_lahir', 'agama',  'alamat', 'telepon'
            ));
        } elseif ($role == '3') {
            $request->validate([
                // 'nim' => 'required|string|max:20',
                'nama_lengkap' => 'required|string|max:255',
                // 'prodi_id' => 'required|integer',
                'gender' => 'required|string|max:10',
                'tempat_lahir' => 'required|string|max:100',
                'tanggal_lahir' => 'required|date',
                'agama' => 'required|string|max:50',
                // 'status_mahasiswa' => 'required|string|max:50',
                'alamat' => 'required|string|max:255',
                'telepon' => 'required|string|max:15',
            ]);

            $user->mahasiswa()->update($request->only(
                 'nama_lengkap',  'gender', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat', 'telepon'
            ));
        }

        Alert::success('Data Berhasil Diperbarui', 'success');
        return redirect()->route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
