<?php

namespace App\Filament\Resources\ReferensiWilayahs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReferensiWilayahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_wilayah')
                    ->required(),
                TextInput::make('kecamatan')
                    ->required(),
                TextInput::make('kabupaten')
                    ->required(),
                TextInput::make('provinsi')
                    ->required(),
            ]);
    }
}
