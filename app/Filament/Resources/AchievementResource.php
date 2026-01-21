<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AchievementResource\Pages;
use App\Models\Achievement;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Schema; // PENTING: Wajib pakai Schema
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\EditAction;   
use Filament\Actions\DeleteAction; 

class AchievementResource extends Resource
{
    protected static ?string $model = Achievement::class;

    // Konfigurasi Icon & Grup Menu (Versi Strict)
    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-trophy';
    protected static \UnitEnum|string|null $navigationGroup = 'Profil';
    
    protected static ?string $navigationLabel = 'Prestasi';
    protected static ?string $pluralModelLabel = 'Data Prestasi';

    // Form menggunakan Schema (Bukan Form)
    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('title')
                ->label('Nama Prestasi/Lomba')
                ->required()
                ->maxLength(255),
            
            TextInput::make('rank')
                ->label('Peringkat/Juara')
                ->placeholder('Contoh: Juara 1, Medali Emas')
                ->required()
                ->maxLength(255),

            TextInput::make('event_name')
                ->label('Nama Event / Penyelenggara')
                ->maxLength(255),

            DatePicker::make('date')
                ->label('Tanggal Perolehan')
                ->required(),

            FileUpload::make('image')
                ->label('Foto Dokumentasi')
                ->image()
                ->directory('achievements')
                ->columnSpanFull(),

            Textarea::make('description')
                ->label('Keterangan Tambahan')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // PERUBAHAN: Tambahkan ->circular() di sini
                Tables\Columns\ImageColumn::make('image')
                    ->circular(), 
                
                Tables\Columns\TextColumn::make('title')
                    ->label('Prestasi')
                    ->searchable()
                    ->description(fn (Achievement $record): string => $record->event_name ?? ''),

                Tables\Columns\TextColumn::make('rank')
                    ->label('Peringkat')
                    ->badge()
                    ->color('success')
                    ->searchable(),

                Tables\Columns\TextColumn::make('date')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable()
                    ->searchable(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->defaultSort('date', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAchievements::route('/'),
            'create' => Pages\CreateAchievement::route('/create'),
            'edit' => Pages\EditAchievement::route('/{record}/edit'),
        ];
    }
}