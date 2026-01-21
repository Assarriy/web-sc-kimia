<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganizationMemberResource\Pages;
use App\Models\OrganizationMember;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
// PERBAIKAN DI SINI: Menggunakan namespace 'Filament\Actions'
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;

class OrganizationMemberResource extends Resource
{
    protected static ?string $model = OrganizationMember::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-user-group';
    protected static \UnitEnum|string|null $navigationGroup = 'Profil';
    
    protected static ?string $navigationLabel = 'Pengurus SC Kimia';
    protected static ?string $pluralModelLabel = 'Data Pengurus';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
                ->label('Nama Lengkap')
                ->required()
                ->maxLength(255),
            
            Select::make('role')
                ->label('Jabatan')
                ->options([
                    'Pembina' => 'Pembina',
                    'Pelatih' => 'Pelatih',
                    'Ketua' => 'Ketua',
                    'Wakil Ketua' => 'Wakil Ketua',
                    'Anggota' => 'Anggota',
                ])
                ->required(),

            FileUpload::make('image')
                ->label('Foto')
                ->image()
                ->directory('organization-members')
                ->columnSpanFull(),

            Textarea::make('description')
                ->label('Deskripsi Singkat (Opsional)')
                ->maxLength(65535)
                ->columnSpanFull(),
            
            TextInput::make('sort_order')
                ->label('Urutan Tampilan')
                ->numeric()
                ->default(0)
                ->helperText('Angka lebih kecil tampil duluan'),

            Toggle::make('is_active')
                ->label('Aktif')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('role')
                    ->label('Jabatan')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Ketua' => 'danger',
                        'Pembina' => 'warning',
                        'Pelatih' => 'success',
                        default => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Aktif'),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->defaultSort('sort_order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizationMembers::route('/'),
            'create' => Pages\CreateOrganizationMember::route('/create'),
            'edit' => Pages\EditOrganizationMember::route('/{record}/edit'),
        ];
    }
}