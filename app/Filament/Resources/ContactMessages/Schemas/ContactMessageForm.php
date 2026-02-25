<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Grid::make(3)->schema([
                // AREA KIRI: Isi Pesan (Dibuat Read-only)
                Section::make('Detail Pesan')
                    ->columnSpan(2)
                    ->schema([
                        TextInput::make('name')->label('Nama Pengirim')->readOnly(),
                        TextInput::make('email')->label('Email')->readOnly(),
                        TextInput::make('subject')->label('Subjek')->readOnly(),
                        Textarea::make('message')
                            ->label('Isi Pesan')
                            ->rows(8)
                            ->readOnly(),
                    ]),

                // AREA KANAN: Status & Waktu
                Section::make('Informasi Tambahan')
                    ->columnSpan(1)
                    ->schema([
                        Toggle::make('is_read')
                            ->label('Tandai Sudah Dibaca')
                            ->onColor('success'),

                        Placeholder::make('created_at')
                            ->label('Diterima Pada')
                            ->content(fn($record) => $record?->created_at->format('d M Y H:i')),
                    ]),
            ])->columnSpanFull(),
        ]);
    }
}
