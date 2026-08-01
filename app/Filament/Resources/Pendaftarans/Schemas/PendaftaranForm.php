<?php

namespace App\Filament\Resources\Pendaftarans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class PendaftaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
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
                    ->disabled() // Supaya tidak bisa diedit user
                    ->dehydrated() // Supaya nilainya tetap dikirim dan disimpan ke database
                    ->required(),
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
                    ->required(),
            ]);
    }
}
