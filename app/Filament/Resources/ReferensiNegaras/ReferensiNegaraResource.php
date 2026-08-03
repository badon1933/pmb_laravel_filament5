<?php

namespace App\Filament\Resources\ReferensiNegaras;

use App\Filament\Resources\ReferensiNegaras\Pages\CreateReferensiNegara;
use App\Filament\Resources\ReferensiNegaras\Pages\EditReferensiNegara;
use App\Filament\Resources\ReferensiNegaras\Pages\ListReferensiNegaras;
use App\Filament\Resources\ReferensiNegaras\Schemas\ReferensiNegaraForm;
use App\Filament\Resources\ReferensiNegaras\Tables\ReferensiNegarasTable;
use App\Models\ReferensiNegara;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ReferensiNegaraResource extends Resource
{
    protected static ?string $model = ReferensiNegara::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::GlobeAsiaAustralia;

    protected static string|UnitEnum|null $navigationGroup = 'Sistem';

    public static function form(Schema $schema): Schema
    {
        return ReferensiNegaraForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReferensiNegarasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListReferensiNegaras::route('/'),
        ];
    }
}
