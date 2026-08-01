<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class GelombangPendaftaran extends Model
{
    use HasUlids;
    
    protected $table = 'gelombang_pendaftaran';
    
    protected $fillable = [
        'gelombang_pendaftaran',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];
}
