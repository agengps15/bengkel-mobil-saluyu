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
    public function konfirmasiPermintaan($id)
{
    $booking = Booking::findOrFail($id);

    // Cari id status "Dikonfirmasi"
    $statusDikonfirmasi = \App\Models\Status::where('nama_status', 'Dikonfirmasi')->first();

    if ($statusDikonfirmasi) {
        $booking->status_id = $statusDikonfirmasi->id;
        $booking->save();
        return redirect()->route('admin.permintaan-layanan')->with('success', 'Permintaan layanan telah dikonfirmasi!');
    } else {
        return back()->with('error', 'Status Dikonfirmasi belum tersedia.');
    }
}


}
