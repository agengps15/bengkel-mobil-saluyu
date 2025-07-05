<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }
    
    
    public function hapusPermintaan($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('success', 'Permintaan berhasil dihapus.');
    }
    
    
    
    // Menampilkan permintaan layanan untuk admin
    public function permintaanLayanan()
    {
        // Mengambil semua data booking yang sudah ada (permintaan layanan)
        $bookings = Booking::all();

        // Mengirimkan data ke view admin.permintaan-layanan
        return view('admin.daftar_permintaan', compact('bookings'));
    }

    // Konfirmasi permintaan layanan
    public function konfirmasiPermintaan(Request $request, $id)
{
 
    $booking = Booking::findOrFail($id);

    // Cari id status "Dikonfirmasi"
    $status = \App\Models\Status::where('nama_status', $request->status)->first();
    // $statusDikonfirmasi = \App\Models\Status::where('nama_status', 'Dikonfirmasi')->first();
    $booking->tagihan = $request->tagihan;
    $booking->rincian_biaya = $request->rincian_biaya;

    if ($status) {
        $booking->status_id = $status->id;
        $booking->save();
        return redirect()->route('admin.permintaan-layanan')->with('success', 'Status permintaan berhasil diperbarui!');
    } else {
        return back()->with('error', 'Status tidak ditemukan.');
    }
}

// public function Tagihan(Request $request)
//     {
//         // Validasi input
//         $validated = $request->validate([
//             'tagihan' => 'required|numeric',
//             'rincian_biaya' => 'required|string',
//             'booking_id' => 'required|exists:bookings,id',
//         ]);

//         // Cari booking berdasarkan ID
//         $booking = Booking::findOrFail($request->booking_id);

//         // Update tagihan dan rincian biaya
//         $booking->tagihan = $request->tagihan;
//         $booking->rincian_biaya = $request->rincian_biaya;
//         $booking->save();

//         // Kembali ke halaman permintaan layanan dengan pesan sukses
//         return redirect()->route('admin.permintaan-layanan')->with('success', 'Tagihan dan rincian biaya berhasil diperbarui!');
//     }
}




