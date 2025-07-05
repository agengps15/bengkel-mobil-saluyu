<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = ['nama_status'];
    public $timestamps = false;

    // Relasi ke bookings (satu status bisa punya banyak booking)
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
