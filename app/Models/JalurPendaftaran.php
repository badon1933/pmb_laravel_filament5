<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class JalurPendaftaran extends Model
{
    use HasUlids;

    protected $table = 'jalur_pendaftaran';

    protected $fillable = [
        'jalur_pendaftaran',
        'deskripsi',
        'status',
    ];
}
