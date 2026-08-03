<?php

namespace Database\Seeders;

use App\Models\Pendaftaran;
use App\Models\DetailCamaba;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pendaftaran::factory(10)->has(DetailCamaba::factory())->create();
    }
}
