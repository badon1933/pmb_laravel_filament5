<?php

namespace App\Filament\Resources\DetailCamabas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DetailCamabaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('pendaftaran_id')
                    ->required(),
                TextInput::make('kewarganegaraan')
                    ->required(),
                TextInput::make('nik')
                    ->required(),
                TextInput::make('nisn')
                    ->required(),
                TextInput::make('npwp'),
                TextInput::make('hp')
                    ->required(),
                TextInput::make('telepon_rumah')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('jalan'),
                TextInput::make('dusun'),
                TextInput::make('rt'),
                TextInput::make('rw'),
                TextInput::make('kelurahan'),
                TextInput::make('kecamatan')
                    ->required(),
                TextInput::make('kode_pos'),
                TextInput::make('jenis_tinggal'),
                TextInput::make('alat_transportasi'),
                TextInput::make('kebutuhan_khusus')
                    ->required(),
                TextInput::make('penerima_kps')
                    ->required(),
            ]);
    }
}
