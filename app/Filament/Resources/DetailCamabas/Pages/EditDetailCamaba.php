<?php

namespace App\Filament\Resources\DetailCamabas\Pages;

use App\Filament\Resources\DetailCamabas\DetailCamabaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDetailCamaba extends EditRecord
{
    protected static string $resource = DetailCamabaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
