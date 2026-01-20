<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            // Grid responsif: 1 kolom di mobile, 3 kolom di desktop (lg)
            Grid::make([
                'default' => 1,
                'lg' => 3,
            ])->schema([

                        // AREA KIRI (KONTEN UTAMA) - Mengambil 2 dari 3 kolom
                        Section::make('Konten Media')
                            ->description('Masukkan detail foto atau video kegiatan SC Kimia.')
                            ->columnSpan([
                                'default' => 1,
                                'lg' => 2,
                            ])
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul Kegiatan')
                                    ->required()
                                    ->maxLength(255),

                                Select::make('type')
                                    ->label('Jenis Media')
                                    ->options([
                                        'image' => 'Foto (Upload)',
                                        'video' => 'Video (URL)',
                                    ])
                                    ->required()
                                    ->live()
                                    ->native(false),

                                FileUpload::make('file_path')
                                    ->label('File Foto')
                                    ->image()
                                    ->directory('gallery/photos')
                                    ->visible(fn($get) => $get('type') === 'image')
                                    ->required(fn($get) => $get('type') === 'image')
                                    ->imageEditor(),

                                TextInput::make('video_url')
                                    ->label('URL Video')
                                    ->url()
                                    ->placeholder('https://youtube.com/...')
                                    ->visible(fn($get) => $get('type') === 'video')
                                    ->required(fn($get) => $get('type') === 'video'),

                                Textarea::make('description')
                                    ->label('Keterangan')
                                    ->rows(4),
                            ]),

                        // AREA KANAN (SIDEBAR) - Mengambil 1 dari 3 kolom
                        Section::make('Status & Kategori')
                            ->columnSpan([
                                'default' => 1,
                                'lg' => 1,
                            ])
                            ->schema([
                                TextInput::make('category')
                                    ->label('Kategori')
                                    ->placeholder('Contoh: Praktikum')
                                    ->required(),

                                Toggle::make('is_featured')
                                    ->label('Tampilkan di Beranda')
                                    ->default(false),

                                Hidden::make('user_id')
                                    ->default(fn() => auth()->id()),
                            ])
                            // Tambahan agar sidebar tetap memiliki batas lebar maksimal yang manis di desktop
                            ->extraAttributes(['class' => 'w-full md:max-w-[320px]']),

                    ])->columnSpanFull(),
        ]);
    }
}
