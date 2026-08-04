<?php

namespace App\Filament\Resources\Pendaftarans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\FieldSet;
use Filament\Schemas\Components\Utilities\Set;
use App\Models\DetailCamaba;
use App\Models\DetailKeluarga;
use App\Models\ReferensiNegara;
use App\Models\ReferensiWilayah;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Components\FileUpload;

class PendaftaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Data Pendaftaran')
                        ->schema([
                            FieldSet::make('Data Pendaftaran')
                                ->schema([
                                    Select::make('jalur_pendaftaran_id')
                                        ->relationship(
                                            'jalur_pendaftaran', 
                                            'jalur_pendaftaran',
                                            fn (\Illuminate\Database\Eloquent\Builder $query) => $query->where('status', 'aktif')
                                        )
                                        ->required(),
                                    Select::make('gelombang_pendaftaran_id')
                                        ->relationship(
                                            'gelombang_pendaftaran',
                                            'gelombang_pendaftaran',
                                            fn (\Illuminate\Database\Eloquent\Builder $query) => $query->where('status', 'aktif')
                                        )   
                                        ->required(),
                                    Select::make('tahun_akademik_id')
                                        ->relationship('tahun_akademik', 'tahun_akademik')
                                        ->default(fn () => \App\Models\TahunAkademik::where('status', 'aktif')->value('id'))
                                        ->disabled()
                                        ->dehydrated()
                                        ->required(),
                                    TextInput::make('nomor_pendaftaran')
                                        ->default(function () {
                                            $count = \App\Models\Pendaftaran::count() + 1;
                                            return 'PMB-' . date('Y') . '-' . str_pad($count, 4, '0', STR_PAD_LEFT);
                                        })
                                        ->disabled()
                                        ->dehydrated()
                                        ->required(),
                                ])->columns(2),
                            FieldSet::make('Biodata Camaba')
                                ->schema([
                                    TextInput::make('nama_lengkap')
                                        ->label('Nama Lengkap')
                                        ->required(),
                                    Select::make('jenis_kelamin')
                                        ->label('Jenis Kelamin')
                                        ->options(\App\Models\Pendaftaran::$listJenisKelamin)
                                        ->required(),
                                    TextInput::make('tempat_lahir')
                                        ->label('Tempat Lahir')
                                        ->required(),
                                    DatePicker::make('tanggal_lahir')
                                        ->label('Tanggal Lahir')
                                        ->required(),
                                    Select::make('agama')
                                        ->options(\App\Models\Pendaftaran::$listAgama)
                                        ->label('Agama')
                                        ->required(),
                                    TextInput::make('nama_ibu')
                                        ->label('Nama Ibu')
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('detailKeluarga.nama_ibu', $state))
                                        ->required(),
                                ])->columns(2),
                        ])->columns(1),
                    
                    Step::make('Detail Camaba')
                        ->schema([
                            Group::make()
                                ->relationship('detailCamaba')
                                ->schema([
                                    FieldSet::make('Identitas Diri')
                                        ->schema([
                                            Select::make('kewarganegaraan')
                                                ->options(ReferensiNegara::all()->pluck('negara', 'kode'))
                                                ->default('ID')
                                                ->searchable()
                                                ->required(),
                                            TextInput::make('nik')
                                                ->label('NIK (Nomor Induk Kependudukan)')
                                                ->numeric()
                                                ->length(16)
                                                ->required(),
                                            TextInput::make('nisn')
                                                ->label('NISN (Nomor Induk Siswa Nasional)')
                                                ->helperText('Bagi yang tidak memiliki NISN, silakan ketik angka 0 sebanyak 10 kali.')
                                                ->numeric()
                                                ->length(10)
                                                ->required(),
                                            TextInput::make('npwp')
                                                ->label('NPWP (Nomor Pokok Wajib Pajak)'),
                                        ])->columns(2),

                                    FieldSet::make('Kontak')
                                        ->schema([
                                            TextInput::make('hp')
                                                ->label('No. HP')
                                                ->required(),
                                            TextInput::make('telepon_rumah')
                                                ->label('Telepon Rumah')
                                                ->tel(),
                                            TextInput::make('email')
                                                ->label('Alamat Email')
                                                ->email()
                                                ->required(),
                                        ])->columns(2),

                                    FieldSet::make('Alamat')
                                        ->schema([
                                            TextInput::make('jalan'),
                                            TextInput::make('dusun')
                                                ->label('Dusun / Kampung'),
                                            TextInput::make('rt')
                                                ->label('RT'),
                                            TextInput::make('rw')
                                                ->label('RW'),
                                            TextInput::make('kelurahan')
                                                ->label('Kelurahan / Desa'),
                                            Select::make('kecamatan')
                                                ->options(ReferensiWilayah::all()->pluck(fn($record) => "{$record->kecamatan}, {$record->kabupaten}, {$record->provinsi}", 'kode_wilayah'))
                                                ->searchable()
                                            ->required(),
                                            TextInput::make('kode_pos')
                                                ->label('Kode Pos'),
                                        ])->columns(2),

                                    FieldSet::make('Lainnya')
                                        ->schema([
                                            Select::make('jenis_tinggal')
                                                ->label('Jenis Tinggal')
                                                ->options(DetailCamaba::$listJenisTinggal),
                                            Select::make('alat_transportasi')
                                                ->label('Alat Transportasi')
                                                ->options(DetailCamaba::$listAlatTransportasi),
                                            Select::make('kebutuhan_khusus')
                                                ->label('Kebutuhan Khusus')
                                                ->options(['Tidak' => 'Tidak', 'Ya' => 'Ya'])
                                                ->default('Tidak')
                                                ->required(),
                                            Select::make('penerima_kps')
                                                ->label('Penerima KPS')
                                                ->options(['Tidak' => 'Tidak', 'Ya' => 'Ya'])
                                                ->default('Tidak')
                                                ->required(),
                                        ])->columns(2),
                                ])
                                ->columns(1),
                        ]),
                    Step::make('Detail Keluarga')
                        ->schema([
                            Group::make()
                                ->relationship('detailKeluarga')
                                ->schema([
                                    FieldSet::make('Data Ayah')
                                        ->schema([
                                            TextInput::make('nik_ayah')
                                                ->label('NIK Ayah'),
                                            TextInput::make('nama_ayah')
                                                ->label('Nama Ayah'),
                                            DatePicker::make('tanggal_lahir_ayah')
                                                ->label('Tanggal Lahir Ayah'),
                                            Select::make('pendidikan_ayah')
                                                ->label('Pendidikan Ayah')
                                                ->options(DetailKeluarga::$listPendidikan),
                                            Select::make('pekerjaan_ayah')
                                                ->label('Pekerjaan Ayah')
                                                ->options(DetailKeluarga::$listPekerjaan),
                                            Select::make('penghasilan_ayah')
                                                ->label('Penghasilan Ayah')
                                                ->options(DetailKeluarga::$listPenghasilan),
                                        ])->columns(2),

                                    Fieldset::make('Data Ibu')
                                        ->schema([
                                            TextInput::make('nik_ibu')
                                                ->label('NIK Ibu'),
                                            TextInput::make('nama_ibu')
                                                ->label('Nama Ibu')
                                                ->helperText('Terisi Otomatis')
                                                ->disabled()
                                                ->dehydrated(),
                                            DatePicker::make('tanggal_lahir_ibu')
                                                ->label('Tanggal Lahir Ibu'),
                                            Select::make('pendidikan_ibu')
                                                ->label('Pendidikan Ibu')
                                                ->options(DetailKeluarga::$listPendidikan),
                                            Select::make('pekerjaan_ibu')
                                                ->label('Pekerjaan Ibu')
                                                ->options(DetailKeluarga::$listPekerjaan),
                                            Select::make('penghasilan_ibu')
                                                ->label('Penghasilan Ibu')
                                                ->options(DetailKeluarga::$listPenghasilan),
                                        ])->columns(2),

                                    Fieldset::make('Data Wali')
                                        ->schema([
                                            TextInput::make('nik_wali')
                                                ->label('NIK Wali'),
                                            TextInput::make('nama_wali')
                                                ->label('Nama Wali'),
                                            DatePicker::make('tanggal_lahir_wali')
                                                ->label('Tanggal Lahir Wali'),
                                            Select::make('pendidikan_wali')
                                                ->label('Pendidikan Wali')
                                                ->options(DetailKeluarga::$listPendidikan),
                                            Select::make('pekerjaan_wali')
                                                ->label('Pekerjaan Wali')
                                                ->options(DetailKeluarga::$listPekerjaan),
                                            Select::make('penghasilan_wali')
                                                ->label('Penghasilan Wali')
                                                ->options(DetailKeluarga::$listPenghasilan),
                                        ])->columns(2),
                                ])
                        ]),
                    Step::make('Upload Dokumen')
                        ->schema([
                            Group::make()
                                ->relationship('dokumen')
                                ->schema([
                                    FileUpload::make('ijazah')
                                        ->label('Ijazah')
                                        ->directory('pendaftaran/dokumen')
                                        ->acceptedFileTypes([
                                            'application/pdf', 'image/jpeg', 'image/jpg', 'image/png'
                                        ])
                                        ->maxSize(2048)
                                        ->helperText('Ukuran maksimal 2MB, Format : PDF, JPG, PNG')
                                        ->previewable(true)
                                        ->required(),
                                    FileUpload::make('transkrip_nilai')
                                        ->label('Transkrip Nilai')
                                        ->directory('pendaftaran/dokumen')
                                        ->acceptedFileTypes([
                                            'application/pdf', 'image/jpeg', 'image/jpg', 'image/png'
                                        ])
                                        ->maxSize(2048)
                                        ->helperText('Ukuran maksimal 2MB, Format : PDF, JPG, PNG')
                                        ->previewable(true)
                                        ->required(),
                                    FileUpload::make('ktp')
                                        ->label('KTP')
                                        ->directory('pendaftaran/dokumen')
                                        ->acceptedFileTypes([
                                            'application/pdf', 'image/jpeg', 'image/jpg', 'image/png'
                                        ])
                                        ->maxSize(2048)
                                        ->helperText('Ukuran maksimal 2MB, Format : PDF, JPG, PNG')
                                        ->previewable(true)
                                        ->required(),
                                    FileUpload::make('kk')
                                        ->label('Kartu Keluarga')
                                        ->directory('pendaftaran/dokumen')
                                        ->acceptedFileTypes([
                                            'application/pdf', 'image/jpeg', 'image/jpg', 'image/png'
                                        ])
                                        ->maxSize(2048)
                                        ->helperText('Ukuran maksimal 2MB, Format : PDF, JPG, PNG')
                                        ->previewable(true)
                                        ->required(),
                                    FileUpload::make('akta_lahir')
                                        ->label('Akta Kelahiran')
                                        ->directory('pendaftaran/dokumen')
                                        ->acceptedFileTypes([
                                            'application/pdf', 'image/jpeg', 'image/jpg', 'image/png'
                                        ])
                                        ->maxSize(2048)
                                        ->helperText('Ukuran maksimal 2MB, Format : PDF, JPG, PNG')
                                        ->previewable(true)
                                        ->required(),
                                    FileUpload::make('dokumen_lainnya')
                                        ->label('Dokumen Lainnya')
                                        ->directory('pendaftaran/dokumen')
                                        ->acceptedFileTypes([
                                            'application/pdf', 'image/jpeg', 'image/jpg', 'image/png'
                                        ])
                                        ->maxSize(2048)
                                        ->helperText('Ukuran maksimal 2MB, Format : PDF, JPG, PNG')
                                        ->previewable(true),
                                ]),
                        ])
                ])->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                    >
                        Simpan
                    </x-filament::button>
                BLADE)))->columnSpanFull()
            ]);
    }
}
