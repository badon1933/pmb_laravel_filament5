<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class TahunAkademik extends Model
{
    use HasUlids;
    
    protected $table = 'tahun_akademik';
    
    protected $fillable = [
        'tahun_akademik',
        'status',
    ];
}
