<?php

namespace App\Filament\Resources\Pendaftarans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Enums\FiltersLayout;

class PendaftaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_pendaftaran')
                    ->searchable(),
                TextColumn::make('nama_lengkap')
                    ->searchable(),
                TextColumn::make('jenis_kelamin')
                    ->formatStateUsing(fn (string $state): string => \App\Models\Pendaftaran::$listJenisKelamin[$state] ?? $state)
                    ->searchable(),
                TextColumn::make('jalur_pendaftaran.jalur_pendaftaran')
                    ->label('Jalur Pendaftaran')
                    ->sortable(),
                TextColumn::make('gelombang_pendaftaran.gelombang_pendaftaran')
                    ->label('Gelombang Pendaftaran')
                    ->sortable(),
                TextColumn::make('tahun_akademik.tahun_akademik')
                    ->label('Tahun Akademik')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Pendaftaran')
                    ->date('d-m-Y')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('tahun_akademik_id')
                    ->multiple()
                    ->relationship('tahun_akademik', 'tahun_akademik')
                    ->preload()
                    ->searchable()
                    ->label('Tahun Akademik'),
                SelectFilter::make('jalur_pendaftaran_id')
                    ->multiple()
                    ->relationship('jalur_pendaftaran', 'jalur_pendaftaran')
                    ->preload()
                    ->searchable()
                    ->label('Jalur Pendaftaran'),
                SelectFilter::make('gelombang_pendaftaran_id')
                    ->multiple()
                    ->relationship('gelombang_pendaftaran', 'gelombang_pendaftaran')
                    ->preload()
                    ->searchable()
                    ->label('Gelombang Pendaftaran'),
            ])
            ->filtersLayout(FiltersLayout::Modal)
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
