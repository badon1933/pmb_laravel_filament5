<?php

namespace App\Filament\Resources\ReferensiNegaras\Pages;

use App\Filament\Resources\ReferensiNegaras\ReferensiNegaraResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReferensiNegaras extends ListRecords
{
    protected static string $resource = ReferensiNegaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
