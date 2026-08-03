<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ReferensiNegara;

class ReferensiNegaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvFile = fopen(resource_path("csv/ref_negara.csv"), "r");
        
        $firstline = true;
        
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                ReferensiNegara::create([
                    'kode' => $data[0],
                    'negara' => $data[1],
                ]);
            }
            $firstline = false;
        }
        
        fclose($csvFile);
    }
}
