<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\AdminController;
use App\Models\Booking;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/layouts/app');
});

Route::middleware('auth')->get('/dashboard', function () {
    return view('/admin');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Menampilkan permintaan layanan untuk admin
    Route::get('/permintaan-layanan', [AdminController::class, 'permintaanLayanan'])->name('admin.permintaan-layanan');

    // Mengonfirmasi permintaan layanan
    Route::post('/permintaan-layanan/{id}/konfirmasi', [AdminController::class, 'konfirmasiPermintaan'])->name('admin.permintaan-layanan.konfirmasi');
});

// Login & Register Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Booking Routes
Route::get('/booking/riwayat', [BookingController::class, 'riwayat'])->name('booking.riwayat');
Route::get('/riwayat/booking', [BookingController::class, 'index'])->name('booking.index');
Route::delete('/booking/{id}', [BookingController::class,'hapusBooking'])->name('booking.hapus');
Route::post('/riwayat/booking', [BookingController::class, 'store'])->name('booking.store');

// untuk admin
// tes

Route::prefix('admin')->middleware('auth', 'admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'permintaanLayanan'])->name('dashboard');
    Route::get('/daftar_permintaan', [BookingController::class, 'riwayatAdmin'])->name('admin.daftar-permintaan');
    // Route lainnya untuk admin
});


Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
// Tambah route untuk hapus
Route::delete('/admin/permintaan-layanan/{id}/hapus', [AdminController::class, 'hapusPermintaan'])->name('admin.permintaan-layanan.hapus');
// Route::get('/admin/permintaan-layanan/{id}/hapus', [AdminController::class, 'hapusPermintaan'])->name('admin.permintaan-layanan.hapus');
Route::post('/admin/permintaan-layanan/{id}/konfirmasi', [AdminController::class, 'konfirmasiPermintaan'])->name('admin.permintaan-layanan.konfirmasi');

// Pastikan route ini ada dan mengarah ke controller yang sesuai
// Route::get('/admin/daftar_permintaan', [BookingController::class, 'riwayatAdmin'])->name('admin.daftar-permintaan')->middleware('auth');


