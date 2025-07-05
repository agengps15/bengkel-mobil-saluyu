<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('status')->insert([
            ['nama_status' => 'Menunggu'],
            ['nama_status' => 'Dikonfirmasi'],
            ['nama_status' => 'Selesai'],
        ]);
    }
}
