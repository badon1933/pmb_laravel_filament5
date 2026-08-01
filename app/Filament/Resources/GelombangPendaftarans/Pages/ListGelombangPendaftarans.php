<?php

namespace App\Filament\Resources\GelombangPendaftarans\Pages;

use App\Filament\Resources\GelombangPendaftarans\GelombangPendaftaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGelombangPendaftarans extends ListRecords
{
    protected static string $resource = GelombangPendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
