<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengecek apakah pengguna sudah login dan berdasarkan role mengarahkan ke halaman yang sesuai
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                // Jika admin, arahkan ke halaman dashboard admin
                return view('admin.dashboard');
            }

            // Jika user, arahkan ke halaman utama (app.blade.php)
            return view('layouts.app');  // Pastikan app.blade.php berada di folder resources/views/layouts/
        }

        return redirect()->route('login'); // Jika pengguna belum login, arahkan ke halaman login
    }
}
