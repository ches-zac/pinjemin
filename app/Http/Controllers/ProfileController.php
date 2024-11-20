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
        /** @var \App\Models\User $user */
        return view('profile.show', [
            'user' => Auth::user()
        ]);
    }

    //fungsi untuk memindahkan user ke halaman edit profile
    public function edit()
    {
        /** @var \App\Models\User $user */
        return view('profile.edit', [
            'user' => Auth::user()
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
                // 'avatar' => ['nullable', 'image', 'max:1024'],
                'no_telp' => ['nullable', 'string', 'max:20'],
            ]);

            // if ($request->hasFile('avatar')) {
            //     if ($user->avatar && Storage::exists($user->avatar)) {
            //         Storage::delete($user->avatar);
            //     }

            //     $path = $request->file('avatar')->store('avatars', 'public');
            //     $validated['avatar'] = $path;
            // }

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
