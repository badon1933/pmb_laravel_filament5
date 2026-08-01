<?php

namespace App\Filament\Resources\DetailCamabas;

use App\Filament\Resources\DetailCamabas\Pages\CreateDetailCamaba;
use App\Filament\Resources\DetailCamabas\Pages\EditDetailCamaba;
use App\Filament\Resources\DetailCamabas\Pages\ListDetailCamabas;
use App\Filament\Resources\DetailCamabas\Schemas\DetailCamabaForm;
use App\Filament\Resources\DetailCamabas\Tables\DetailCamabasTable;
use App\Models\DetailCamaba;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DetailCamabaResource extends Resource
{
    protected static ?string $model = DetailCamaba::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::User;

    public static function form(Schema $schema): Schema
    {
        return DetailCamabaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DetailCamabasTable::configure($table);
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
            'index' => ListDetailCamabas::route('/'),
            'create' => CreateDetailCamaba::route('/create'),
            'edit' => EditDetailCamaba::route('/{record}/edit'),
        ];
    }
}
