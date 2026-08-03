<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReferensiWilayah;

class ReferensiWilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(resource_path("csv/ref_wilayah.csv"), "r");
        
        $firstline = true;
        
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                ReferensiWilayah::create([
                    'kode_wilayah' => $data[0],
                    'kecamatan' => $data[1],
                    'kabupaten' => $data[2] ?? '',
                    'provinsi'  => $data[3] ?? ''
                ]);
            }
            $firstline = false;
        }
        
        fclose($csvFile);
    }
    
}
