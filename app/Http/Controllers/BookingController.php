<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
                'nama_pemilik' => 'required|string|max:255',
                'no_hp' => 'required|string|max:15',
                'no_plat' => 'required|string|max:15',
                'layanan' => 'required|string|max:255',
                'nama_kendaraan' => 'required|string|max:255',
                'model_kendaraan' => 'required|string|max:255',
                // 'tipe_kendaraan' => 'required|string|max:255',
                'jenis_permintaan' => 'required|string|max:255',
                'catatan' => 'nullable|string',
                'alamat_pickup' => 'nullable|string',
                // 'tanggal' => 'nullable|date',
        ]);

        $booking = new Booking();
        $booking->nama_pemilik = $request->nama_pemilik;
        $booking->no_hp = $request->no_hp;
        $booking->no_plat = $request->no_plat;
        $booking->layanan = $request->layanan;
        $booking->nama_kendaraan = $request->nama_kendaraan;
        $booking->model_kendaraan = $request->model_kendaraan;
        $booking->jenis_permintaan = $request->jenis_permintaan;
        $booking->catatan = $request->catatan;
        $booking->alamat_pickup = $request->alamat_pickup;
        $booking->user_id = auth()->id();
        // $booking->tipe_kendaraan = $request->tipe_kendaraan;
        // $booking->tanggal = now(); // Simpan waktu sekarang sebagai tanggal booking
        // $booking->status = 'pending'; // Status default booking bisa 'pending'
        $booking->save();

        return redirect()->route('booking.riwayat')->with('success', 'Booking berhasil!');
    }
    public function riwayat()
    {
        // Ambil semua data booking
        $bookings = Booking::where('user_id', auth()->id())->get();

        // Kirim data ke view 'booking.riwayat'
        return view('booking.riwayat', compact('bookings'));
    }

    public function riwayatAdmin()
    {
        $bookings = booking::all();

        return view('admin.daftar_permintaan', compact('bookings'));
    }

    public function hapusBooking($id)
    {
        $booking = Booking::findOrFail($id);
        
        // Menghapus data booking
        $booking->delete();

        // Kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->route('booking.riwayat')->with('success', 'Booking berhasil dihapus!');
    }
    
}




