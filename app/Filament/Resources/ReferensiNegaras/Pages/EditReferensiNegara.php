<?php

namespace App\Filament\Resources\ReferensiNegaras\Pages;

use App\Filament\Resources\ReferensiNegaras\ReferensiNegaraResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditReferensiNegara extends EditRecord
{
    protected static string $resource = ReferensiNegaraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
