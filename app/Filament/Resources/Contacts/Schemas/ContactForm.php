<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;

class ContactForm
{
    public static function schema(Schema $schema): Schema
    {
        return $schema->schema([
            TextInput::make('name')->disabled(),
            TextInput::make('email')->disabled(),
            Textarea::make('message')
                ->rows(5)
                ->disabled(),
        ]);
    }
}
