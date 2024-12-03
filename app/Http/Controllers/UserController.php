<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show() {
        $users = User::paginate(5);
        $title = 'Daftar User';
        return view('admin.users_manage.show', compact('users', 'title'));
    }

    public function edit(User $user)
    {
        $title = 'Edit User';
        return view('admin.users_manage.edit', compact('user', 'title'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi input
        $validatedData = $request->validate([
            'role' => 'required|in:user,admin', // Hanya menerima nilai 'user' atau 'admin'
        ]);

        // Perbarui role user
        $user->role = $validatedData['role'];
        $user->save(); // Simpan perubahan ke database

        // Redirect dengan pesan sukses
        return redirect()->route('show.users')->with('success', 'Role pengguna berhasil diperbarui.');
    }

    public function delete(User $user)
    {
        $user->delete(); // Hapus user
        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }

}

