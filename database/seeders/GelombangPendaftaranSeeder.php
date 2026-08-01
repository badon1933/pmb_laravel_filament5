<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GelombangPendaftaran;

class GelombangPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GelombangPendaftaran::create([
            'gelombang_pendaftaran' => 'Gelombang 1',
            'tanggal_mulai' => '2025-01-01',
            'tanggal_selesai' => '2025-03-31',
            'status' => 'nonaktif',
        ]);

        GelombangPendaftaran::create([
            'gelombang_pendaftaran' => 'Gelombang 2',
            'tanggal_mulai' => '2025-04-01',
            'tanggal_selesai' => '2025-06-30',
            'status' => 'nonaktif',
        ]);

        GelombangPendaftaran::create([
            'gelombang_pendaftaran' => 'Gelombang 3',
            'tanggal_mulai' => '2025-07-01',
            'tanggal_selesai' => '2025-08-31',
            'status' => 'nonaktif',
        ]);
    }
}
