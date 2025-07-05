<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Tambahkan baris ini

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Cek kredensial dan login pengguna
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // Jika role adalah 'admin', arahkan ke halaman admin
        if (auth()->user()->role === 'admin') {
            return redirect()->intended('/dashboard'); // Ganti dengan route halaman admin
        }

        // Jika role adalah 'user', arahkan ke halaman utama (app.blade.php)
        return redirect()->intended('/');  // Arahkan ke halaman utama (app.blade.php)
    }

    return back()->withErrors(['email' => 'Email atau password salah']);
}

    // Menampilkan form register
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',  // Minimum panjang password 8 karakter
        ]);

        // Membuat user baru
        $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user'  // Set role default menjadi 'user'
]);


        auth()->login($user); // Login otomatis setelah register

        return redirect('/login'); // Redirect ke dashboard setelah registrasi berhasil
    }

    // Logout
    public function logout()
    {
        auth()->logout();  // Logout pengguna
        return redirect('/');  // Redirect ke halaman utama setelah logout
    }
}
