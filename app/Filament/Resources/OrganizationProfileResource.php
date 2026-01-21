<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganizationProfileResource\Pages;
use App\Models\OrganizationProfile;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class OrganizationProfileResource extends Resource
{
    protected static ?string $model = OrganizationProfile::class;

    protected static \BackedEnum|string|null $navigationIcon = 'heroicon-o-building-office';
    protected static \UnitEnum|string|null $navigationGroup = 'Profil';
    
    protected static ?string $navigationLabel = 'Tentang & Visi Misi';
    protected static ?string $pluralModelLabel = 'Profil Organisasi';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Identitas Utama')
                ->schema([
                    FileUpload::make('logo')
                        ->label('Logo SC Kimia')
                        ->image()
                        ->directory('organization-profile')
                        ->columnSpanFull(),
                ]),

            Section::make('Tentang Kami')
                ->schema([
                    RichEditor::make('about')
                        ->label('Tentang SC Kimia')
                        ->toolbarButtons([
                            'bold', 'italic', 'underline', 'bulletList', 'orderedList', 'undo', 'redo'
                        ])
                        ->columnSpanFull(),
                ]),

            Section::make('Visi & Misi')
                ->schema([
                    RichEditor::make('vision')
                        ->label('Visi')
                        ->toolbarButtons([
                            'bold', 'italic', 'bulletList', 'undo', 'redo'
                        ])
                        ->columnSpanFull(),

                    RichEditor::make('mission')
                        ->label('Misi')
                        ->toolbarButtons([
                            'bold', 'italic', 'bulletList', 'orderedList', 'undo', 'redo'
                        ])
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo'),
                
                Tables\Columns\TextColumn::make('about')
                    ->label('Tentang')
                    ->limit(50)
                    ->html(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->paginated(false); // Mematikan pagination karena datanya cuma satu
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizationProfiles::route('/'),
            'create' => Pages\CreateOrganizationProfile::route('/create'),
            'edit' => Pages\EditOrganizationProfile::route('/{record}/edit'),
        ];
    }
}