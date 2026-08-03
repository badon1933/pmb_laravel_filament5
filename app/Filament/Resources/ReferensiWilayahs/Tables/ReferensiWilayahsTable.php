<?php

namespace App\Filament\Resources\ReferensiWilayahs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReferensiWilayahsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_wilayah')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('kecamatan')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('kabupaten')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('provinsi')
                    ->sortable()
                    ->searchable(),
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
