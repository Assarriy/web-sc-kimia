<?php

namespace App\Filament\Resources\Galleries\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class GalleriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // Preview Media (Foto atau Placeholder Video)
                ImageColumn::make('file_path')
                    ->label('Media')
                    ->circular()
                    ->defaultImageUrl(url('/images/placeholder-gallery.png')) // Pastikan file ini ada
                    ->checkFileExistence(false),

                // Judul Kegiatan
                TextColumn::make('title')
                    ->label('Judul Kegiatan')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                // Kategori (Badge)
                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color('gray')
                    ->searchable(),

                // Tipe Media (Badge berwarna)
                TextColumn::make('type')
                    ->label('Tipe')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'image' => 'success',
                        'video' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)),

                // Status Featured (Icon)
                IconColumn::make('is_featured')
                    ->label('Beranda')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->sortable(),

                // Tanggal Upload
                TextColumn::make('created_at')
                    ->label('Diunggah')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filter berdasarkan tipe media
                SelectFilter::make('type')
                    ->label('Jenis Media')
                    ->options([
                        'image' => 'Foto',
                        'video' => 'Video',
                    ]),

                // Filter berdasarkan kategori
                SelectFilter::make('category')
                    ->label('Kategori')
                    ->attribute('category'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('Belum ada galeri')
            ->emptyStateDescription('Mulai unggah foto atau video kegiatan kimia Anda.');
    }
}
