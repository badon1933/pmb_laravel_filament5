<?php

namespace App\Filament\Resources\GelombangPendaftarans;

use App\Filament\Resources\GelombangPendaftarans\Pages\CreateGelombangPendaftaran;
use App\Filament\Resources\GelombangPendaftarans\Pages\EditGelombangPendaftaran;
use App\Filament\Resources\GelombangPendaftarans\Pages\ListGelombangPendaftarans;
use App\Filament\Resources\GelombangPendaftarans\Schemas\GelombangPendaftaranForm;
use App\Filament\Resources\GelombangPendaftarans\Tables\GelombangPendaftaransTable;
use App\Models\GelombangPendaftaran;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class GelombangPendaftaranResource extends Resource
{
    protected static ?string $model = GelombangPendaftaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CalendarDays;

    protected static string|UnitEnum|null $navigationGroup = 'Informasi Pendaftaran';

    public static function form(Schema $schema): Schema
    {
        return GelombangPendaftaranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GelombangPendaftaransTable::configure($table);
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
            'index' => ListGelombangPendaftarans::route('/'),
        ];
    }
}
