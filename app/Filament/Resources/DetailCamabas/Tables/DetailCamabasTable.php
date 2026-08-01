<?php

namespace App\Filament\Resources\DetailCamabas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DetailCamabasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pendaftaran.nomor_pendaftaran')
                    ->label('Nomor Pendaftaran')
                    ->searchable(),
                TextColumn::make('kewarganegaraan')
                    ->searchable(),
                TextColumn::make('nik')
                    ->searchable(),
                TextColumn::make('nisn')
                    ->searchable(),
                TextColumn::make('npwp')
                    ->searchable(),
                TextColumn::make('hp')
                    ->searchable(),
                TextColumn::make('telepon_rumah')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('jalan')
                    ->searchable(),
                TextColumn::make('dusun')
                    ->searchable(),
                TextColumn::make('rt')
                    ->searchable(),
                TextColumn::make('rw')
                    ->searchable(),
                TextColumn::make('kelurahan')
                    ->searchable(),
                TextColumn::make('kecamatan')
                    ->searchable(),
                TextColumn::make('kode_pos')
                    ->searchable(),
                TextColumn::make('jenis_tinggal')
                    ->searchable(),
                TextColumn::make('alat_transportasi')
                    ->searchable(),
                TextColumn::make('kebutuhan_khusus')
                    ->searchable(),
                TextColumn::make('penerima_kps')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
