<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\JalurPendaftaran;

class JalurPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JalurPendaftaran::create([
            'jalur_pendaftaran' => 'Jalur KIP',
            'deskripsi' => 'Jalur pendaftaran yang dikhususkan untuk calon mahasiswa baru yang memiliki keterbatasan ekonomi',
            'status' => 'nonaktif',
        ]);

        JalurPendaftaran::create([
            'jalur_pendaftaran' => 'Jalur Reguler',
            'deskripsi' => 'Jalur pendaftaran untuk calon mahasiswa lulusan SMA/SMK/MA atau sederajat',
            'status' => 'nonaktif',
        ]);

        JalurPendaftaran::create([
            'jalur_pendaftaran' => 'Jalur Non-Reguler',
            'deskripsi' => 'Jalur pendaftaran untuk calon mahasiswa lulusan Diploma 3 / Sarjana atau sederajat',
            'status' => 'nonaktif',
        ]);
    }
}
