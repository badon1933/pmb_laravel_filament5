<?php

namespace App\Filament\Resources\ReferensiWilayahs;

use App\Filament\Resources\ReferensiWilayahs\Pages\CreateReferensiWilayah;
use App\Filament\Resources\ReferensiWilayahs\Pages\EditReferensiWilayah;
use App\Filament\Resources\ReferensiWilayahs\Pages\ListReferensiWilayahs;
use App\Filament\Resources\ReferensiWilayahs\Schemas\ReferensiWilayahForm;
use App\Filament\Resources\ReferensiWilayahs\Tables\ReferensiWilayahsTable;
use App\Models\ReferensiWilayah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class ReferensiWilayahResource extends Resource
{
    protected static ?string $model = ReferensiWilayah::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::MapPin;

    protected static string|UnitEnum|null $navigationGroup = 'Sistem';

    public static function form(Schema $schema): Schema
    {
        return ReferensiWilayahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ReferensiWilayahsTable::configure($table);
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
            'index' => ListReferensiWilayahs::route('/'),
        ];
    }
}
