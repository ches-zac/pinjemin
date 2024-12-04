<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan form login
    public function loginForm()
    {
        return view('auth.login');
    }

    //helper hasRole
    protected function hasRole($user, $role)
    {
        return $user->role === $role;
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role
            if ($this->hasRole(Auth::user(), 'admin')) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Tampilkan form register
    public function registerForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Daftar email yang akan jadi admin
        $adminEmails = [
            'admin@example.com',
            'zappchls1214@gmail.com'
        ];

        //menambahkan user baru ke database
        $user = new User();
        $user->nama = $validated['nama'];
        $user->email = $validated['email'];
        $user->password = Hash::make($validated['password']);
        // Set role berdasarkan email
        $user->role = in_array($validated['email'], $adminEmails) ? 'admin' : 'user';
        $user->save();

        Auth::login($user);

        if ($this->hasRole(Auth::user(), 'admin')) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
