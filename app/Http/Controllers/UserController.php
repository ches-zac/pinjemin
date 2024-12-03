<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show() {
        $users = User::all();
        $title = 'Daftar User';
        return view('admin.users_manage.show', compact('users', 'title'));
    }

    public function edit(User $user)
    {
        $title = 'Edit User';
        return view('admin.users_manage.edit', compact('user', 'title'));
    }

    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'role' => 'required|in:user,admin', // Hanya menerima nilai 'user' atau 'admin'
        ]);

        // Ambil user berdasarkan ID yang dikirimkan
        $user = User::findOrFail($request->user_id); // Pastikan `user_id` dikirim dari form

        // Perbarui role user
        $user->role = $validatedData['role'];
        $user->save(); // Simpan perubahan ke database

        // Redirect dengan pesan sukses
        return redirect()->route('show.users')->with('success', 'Role pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete(); // Hapus data
        return redirect()->route('show.users')->with('success', 'Barang berhasil dihapus.');
    }

}

