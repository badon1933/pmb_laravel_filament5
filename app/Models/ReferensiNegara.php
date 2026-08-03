<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class ReferensiNegara extends Model
{
    use HasUlids;
    
    protected $table = 'referensi_negara';

    protected $fillable = [
        'kode',
        'negara',
    ];
}
