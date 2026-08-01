<?php

namespace App\Filament\Resources\GelombangPendaftarans\Pages;

use App\Filament\Resources\GelombangPendaftarans\GelombangPendaftaranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditGelombangPendaftaran extends EditRecord
{
    protected static string $resource = GelombangPendaftaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
