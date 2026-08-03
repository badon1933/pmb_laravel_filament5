<?php

namespace App\Filament\Resources\ReferensiWilayahs\Pages;

use App\Filament\Resources\ReferensiWilayahs\ReferensiWilayahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReferensiWilayahs extends ListRecords
{
    protected static string $resource = ReferensiWilayahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
