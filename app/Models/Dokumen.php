<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokumen extends Model
{
    use HasUlids;
    
    protected $table = 'dokumen';
    
    protected $fillable = [
        'pendaftaran_id',
        'ijazah',
        'transkrip_nilai',
        'ktp',
        'kk',
        'akta_lahir',
        'dokumen_lainnya',
    ];
    
    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
