<?php

namespace App\Filament\Resources\News\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
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
            Grid::make(1)->schema([
                // AREA KIRI (KONTEN UTAMA)
                Section::make('Konten Berita')
                    ->description('Detail berita atau pengumuman SC Kimia.')
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
                            ->readOnly(),

                        RichEditor::make('content')
                            ->label('Isi Berita')
                            ->required()
                            // Toolbar disederhanakan agar tidak merusak layout
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
                    ])->grow(), // Bagian ini akan mengambil ruang sisa

                // AREA KANAN (SIDEBAR)
                Section::make('Status & Media')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Thumbnail')
                            ->image()
                            ->directory('news/images')
                            ->imageEditor(),

                        Select::make('category')
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
                    ])->extraAttributes(['class' => 'w-full md:max-w-[320px]']), // Mengunci lebar sidebar
            ])->columnSpanFull(),
        ]);
    }
}
