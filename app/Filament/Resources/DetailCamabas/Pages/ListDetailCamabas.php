<?php

namespace App\Filament\Resources\DetailCamabas\Pages;

use App\Filament\Resources\DetailCamabas\DetailCamabaResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDetailCamabas extends ListRecords
{
    protected static string $resource = DetailCamabaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
