<?php

namespace App\Filament\Resources\News\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class NewsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->circular(),

                TextColumn::make('title')
                    ->label('Judul Berita')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('category')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'berita' => 'info',
                        'pengumuman' => 'warning',
                    }),

                IconColumn::make('is_published')
                    ->label('Live')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Dibuat Pada')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->options([
                        'berita' => 'Berita',
                        'pengumuman' => 'Pengumuman',
                    ]),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
