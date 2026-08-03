<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class ReferensiWilayah extends Model
{
    use HasUlids;
    
    protected $table = 'referensi_wilayah';

    protected $fillable = [
        'kode_wilayah',
        'kecamatan',
        'kabupaten',
        'provinsi'
    ];
}
