<?php

namespace Database\Factories;

use App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pendaftaran>
 */
class PendaftaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jalur_pendaftaran_id' => \App\Models\JalurPendaftaran::inRandomOrder()->first()?->id ?? \App\Models\JalurPendaftaran::factory(),
            'gelombang_pendaftaran_id' => \App\Models\GelombangPendaftaran::inRandomOrder()->first()?->id ?? \App\Models\GelombangPendaftaran::factory(),
            'tahun_akademik_id' => \App\Models\TahunAkademik::inRandomOrder()->first()?->id ?? \App\Models\TahunAkademik::factory(),
            'nomor_pendaftaran' => 'PMB-' . date('Y') . '-' . $this->faker->unique()->numerify('####'),
            'nama_lengkap' => $this->faker->name(),
            'jenis_kelamin' => $this->faker->randomElement(array_keys(\App\Models\Pendaftaran::$listJenisKelamin)),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->dateTimeBetween('-25 years', '-17 years')->format('Y-m-d'),
            'agama' => $this->faker->randomElement(array_keys(\App\Models\Pendaftaran::$listAgama)),
            'nama_ibu' => $this->faker->name('female'),
        ];
    }
}
