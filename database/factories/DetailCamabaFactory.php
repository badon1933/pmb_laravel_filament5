<?php

namespace Database\Factories;

use App\Models\DetailCamaba;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<DetailCamaba>
 */
class DetailCamabaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pendaftaran_id' => \App\Models\Pendaftaran::factory(),
            'kewarganegaraan' => 'ID',
            'nik' => $this->faker->unique()->numerify('################'),
            'nisn' => $this->faker->unique()->numerify('##########'),
            'npwp' => $this->faker->unique()->numerify('################'),
            'hp' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'telepon_rumah' => $this->faker->phoneNumber(),
            'jalan' => $this->faker->streetName(),
            'dusun' => $this->faker->city(),
            'rt' => $this->faker->numerify('###'),
            'rw' => $this->faker->numerify('###'),
            'kelurahan' => $this->faker->city(),
            'kecamatan' => $this->faker->city(),
            'kode_pos' => $this->faker->numerify('#####'),
            'jenis_tinggal' => $this->faker->randomElement(array_keys(DetailCamaba::$listJenisTinggal)),
            'alat_transportasi' => $this->faker->randomElement(array_keys(DetailCamaba::$listAlatTransportasi)),
            'kebutuhan_khusus' => 'Tidak',
            'penerima_kps' => 'Tidak',
        ];
    }
}
