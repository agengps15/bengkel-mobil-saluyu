<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

     protected $fillable = [
        'nama_pemilik', 'no_hp', 'no_plat', 'layanan', 'nama_kendaraan',
        'model_kendaraan', 'tipe_kendaraan', 'jenis_permintaan', 'alamat_pickup',
        'catatan','user_id', 'bukti_pembayaran'
    ];


    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}

// 'nama_pemilik', 'no_hp', 'no_plat', 'layanan', 'nama_kendaraan',
//         'model_kendaraan', 'tipe_kendaraan', 'jenis_permintaan', 'alamat_pickup',
//         'catatan', 'user_id', 'status', 'bukti_pembayaran'
