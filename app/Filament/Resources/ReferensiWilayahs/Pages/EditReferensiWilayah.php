<?php

namespace App\Filament\Resources\ReferensiWilayahs\Pages;

use App\Filament\Resources\ReferensiWilayahs\ReferensiWilayahResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditReferensiWilayah extends EditRecord
{
    protected static string $resource = ReferensiWilayahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
