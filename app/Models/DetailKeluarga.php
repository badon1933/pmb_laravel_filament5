<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailKeluarga extends Model
{
    use HasUlids;
    
    protected $table = 'detail_keluarga';
    
    protected $fillable = [
        'pendaftaran_id',
        'nik_ayah',
        'nama_ayah',
        'tanggal_lahir_ayah',
        'pendidikan_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nik_ibu',
        'nama_ibu',
        'tanggal_lahir_ibu',
        'pendidikan_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'nik_wali',
        'nama_wali',
        'tanggal_lahir_wali',
        'pendidikan_wali',
        'pekerjaan_wali',
        'penghasilan_wali',
    ];

    public static array $listPendidikan = [
        '0' => 'Tidak Sekolah',
        '1' => 'PAUD',
        '2' => 'TK / Sederajat',
        '3' => 'Putus SD',
        '4' => 'SD / Sederajat',
        '5' => 'SMP / Sederajat',
        '6' => 'SMA / Sederajat',
        '7' => 'Paket A',
        '8' => 'Paket B',
        '9' => 'Paket C',
        '20' => 'Diploma I',
        '21' => 'Diploma II',
        '22' => 'Diploma III',
        '23' => 'Diploma IV',
        '30' => 'Sarjana (S1)',
        '31' => 'Profesi',
        '32' => 'Sp-1',
        '35' => 'S2',
        '36' => 'S2 Terapan',
        '37' => 'Sp-2',
        '40' => 'S3',
        '41' => 'S3 Terapan',
        '90' => 'Non Formal',
        '91' => 'Informal',
        '99' => 'Lainnya'
    ];

    public static array $listPekerjaan = [
        '1' => 'Tidak bekerja',
        '2' => 'Nelayan',
        '3' => 'Petani',
        '4' => 'Peternak',
        '5' => 'PNS/TNI/Polri',
        '6' => 'Karyawan Swasta',
        '7' => 'Pedagang Kecil',
        '8' => 'Pedagang Besar',
        '9' => 'Wiraswasta',
        '10' => 'Wirausaha',
        '11' => 'Buruh',
        '12' => 'Pensiunan',
        '13' => 'Peneliti',
        '14' => 'Tim Ahli / Konsultan',
        '15' => 'Magang',
        '16' => 'Tenaga Pengajar / Instruktur / Fasilitator',
        '17' => 'Pimpinan / Manajerial',
        '98' => 'Sudah Meninggal',
        '99' => 'Lainnya'
    ];

    public static array $listPenghasilan = [
        '11' => 'Kurang dari Rp. 500,000',
        '12' => 'Rp. 500,000 - Rp. 999,999',
        '13' => 'Rp. 1,000,000 - Rp. 1,999,999',
        '14' => 'Rp. 2,000,000 - Rp. 4,999,999',
        '15' => 'Rp. 5,000,000 - Rp. 20,000,000',
        '16' => 'Lebih dari Rp. 20,000,000'
    ];

    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id');
    }
}
