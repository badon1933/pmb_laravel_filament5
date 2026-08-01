<?php

namespace App\Filament\Resources\GelombangPendaftarans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
class GelombangPendaftaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('gelombang_pendaftaran')
                    ->searchable(),
                TextColumn::make('tanggal_mulai')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->locale('id')->translatedFormat('d F Y'))
                    ->sortable(),
                TextColumn::make('tanggal_selesai')
                    ->formatStateUsing(fn ($state) => \Carbon\Carbon::parse($state)->locale('id')->translatedFormat('d F Y'))
                    ->sortable(),
                IconColumn::make('status')
                    ->boolean()
                    ->getStateUsing(fn($record) => $record->status === 'aktif')
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
