<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailCamaba extends Model
{
    use HasUlids, HasFactory;
    protected $table = 'detail_camaba';
    protected $fillable = [
        'pendaftaran_id',
        'kewarganegaraan',
        'nik',
        'nisn',
        'npwp',
        'hp',
        'telepon_rumah',
        'email',
        'jalan',
        'dusun',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kode_pos',
        'jenis_tinggal',
        'alat_transportasi',
        'kebutuhan_khusus',
        'penerima_kps',
    ];

    public static array $listJenisTinggal = [
        '1' => 'Bersama Orang Tua',
        '2' => 'Wali',
        '3' => 'Kost',
        '4' => 'Asrama',
        '10' => 'Rumah Sendiri',
        '99' => 'Lainnya',
    ];

    public static array $listAlatTransportasi = [
        '1' => 'Jalan kaki',
        '3' => 'Angkutan umum/bus/pete-pete',
        '4' => 'Mobil/Bus antar jemput',
        '5' => 'Kereta api',
        '6' => 'Ojek',
        '7' => 'Andong/bendi/sado/dokar/delman/becak',
        '8' => 'Perahu penyeberangan/rakit/getek',
        '11' => 'Kuda',
        '12' => 'Sepeda',
        '13' => 'Sepeda Motor',
        '14' => 'Mobil Pribadi',
        '99' => 'Lainnya',
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class);
    }
}
