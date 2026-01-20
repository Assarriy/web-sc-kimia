<?php

namespace App\Filament\Resources\Contacts\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class ContactsTable
{
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('created_at')->dateTime(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
