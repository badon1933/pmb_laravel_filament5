<?php

namespace App\Filament\Resources\ReferensiNegaras\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReferensiNegaraForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode')
                    ->required(),
                TextInput::make('negara')
                    ->required(),
            ]);
    }
}
