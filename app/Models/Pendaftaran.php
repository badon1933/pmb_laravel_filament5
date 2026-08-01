<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Pendaftaran extends Model
{
    use HasUlids;
    protected $table = 'pendaftaran';
    protected $fillable = [
        'jalur_pendaftaran_id',
        'gelombang_pendaftaran_id',
        'tahun_akademik_id',
        'nomor_pendaftaran',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'nama_ibu',
    ];

    protected $listJenisKelamin = [
        'L' => 'Laki-laki',
        'P' => 'Perempuan'
    ];

    protected $listAgama = [
        '1' => 'Islam',
        '2' => 'Kristen',
        '3' => 'Katholik',
        '4' => 'Hindu',
        '5' => 'Buddha',
        '6' => 'Khonghucu',
        '99' => 'Lainnya'
    ];

    public function jalur_pendaftaran()
    {
        return $this->belongsTo(JalurPendaftaran::class);
    }

    public function gelombang_pendaftaran()
    {
        return $this->belongsTo(GelombangPendaftaran::class);
    }

    public function tahun_akademik()
    {
        return $this->belongsTo(TahunAkademik::class);
    }
}
