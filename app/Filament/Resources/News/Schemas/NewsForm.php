<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\Layout\Split;
use Illuminate\Support\Str;

class NewsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            // Grid utama: 1 kolom di mobile (default), 3 kolom di desktop (lg)
            Grid::make([
                'default' => 1,
                'lg' => 3,
            ])->schema([

                        // AREA KIRI (KONTEN UTAMA) - Mengambil 2 dari 3 kolom
                        Section::make('Konten Berita')
                            ->description('Detail berita atau pengumuman SC Kimia.')
                            ->columnSpan([
                                'default' => 1,
                                'lg' => 2,
                            ])
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul Berita')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                TextInput::make('slug')
                                    ->label('URL Slug')
                                    ->required()
                                    ->unique('news', 'slug', ignoreRecord: true)
                                    ->readOnly()
                                    ->extraAttributes(['class' => 'bg-gray-50']),

                                RichEditor::make('content')
                                    ->label('Isi Berita')
                                    ->required()
                                    ->toolbarButtons([
                                        'bold',
                                        'italic',
                                        'underline',
                                        'strike',
                                        'subscript',
                                        'superscript',
                                        'h2',
                                        'h3',
                                        'bulletList',
                                        'orderedList',
                                        'link',
                                        'attachFiles',
                                        'undo',
                                        'redo',
                                    ])
                                    ->fileAttachmentsDirectory('news/attachments'),
                            ]),

                        // AREA KANAN (SIDEBAR) - Mengambil 1 dari 3 kolom
                        Section::make('Status & Media')
                            ->columnSpan([
                                'default' => 1,
                                'lg' => 1,
                            ])
                            ->schema([
                                FileUpload::make('image')
                                    ->label('Thumbnail Berita')
                                    ->image()
                                    ->disk('public')
                                    ->directory('news')
                                    ->imageEditor(),

                                Select::make('category')
                                    ->label('Kategori')
                                    ->options([
                                        'berita' => 'Berita',
                                        'pengumuman' => 'Pengumuman',
                                    ])
                                    ->required()
                                    ->native(false),

                                Toggle::make('is_published')
                                    ->label('Publikasikan')
                                    ->default(true),

                                Hidden::make('user_id')
                                    ->default(fn() => auth()->id()),
                            ])
                            // Mengunci lebar sidebar agar tidak meluap di desktop
                            ->extraAttributes(['class' => 'w-full md:max-w-[320px]']),

                    ])->columnSpanFull(),
        ]);
    }
}
