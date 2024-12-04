<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    //fungsi menampilkan view profile user
    public function show()
    {
        $title = 'Profile';
        /** @var \App\Models\User $user */
        return view('profile.show', [
            'user' => Auth::user(),
            'title' => $title
        ]);
    }

    //fungsi untuk memindahkan user ke halaman edit profile
    public function edit()
    {
        $title = 'Edit Profile';
        /** @var \App\Models\User $user */
        return view('profile.edit', [
            'user' => Auth::user(),
            'title' => $title
        ]);
    }

    public function update(Request $request)
    {
        try {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            if (!$user) {
                return redirect()->back()->with('error', 'User tidak ditemukan');
            }

            $validated = $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'profile_picture' => ['nullable', 'image', 'max:1024'],
                'no_telp' => ['nullable', 'string', 'max:20'],
            ]);

            if ($request->hasFile('profile_picture')) {
                // Hapus file lama jika ada
                if ($user->profile_picture && file_exists(public_path($user->profile_picture))) {
                    unlink(public_path($user->profile_picture));
                }

                // Simpan file baru
                $file = $request->file('profile_picture');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/profiles'), $filename);

                // Update path di database
                $user->profile_picture = 'images/profiles/' . $filename;
            }

            $updated = $user->update($validated);

            if (!$updated) {
                return redirect()->back()->with('error', 'Gagal memperbarui profil');
            }

            return redirect()->route('profile.show')
                ->with('success', 'Profil berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updatePassword(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $updated = $user->update($validated);

        if (!$updated) {
            return redirect()->back()->with('error', 'Gagal memperbarui password');
        }

        return redirect()->route('profile.show')
            ->with('success', 'Password berhasil diperbarui');

        return back()->with('success', 'Password berhasil diperbarui');
    }
}
