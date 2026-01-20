<?php

namespace App\Filament\Resources\Contacts;

use App\Filament\Resources\Contacts\Pages\EditContact;
use App\Filament\Resources\Contacts\Pages\ListContacts;
use App\Filament\Resources\Contacts\Schemas\ContactForm;
use App\Filament\Resources\Contacts\Tables\ContactsTable;
use App\Models\Contact;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    /**
     * FORM (READ-ONLY)
     */
    public static function form(Schema $schema): Schema
    {
        return ContactForm::schema($schema);
    }

    /**
     * TABLE
     */
    public static function table(Table $table): Table
    {
        return ContactsTable::table($table);
    }

    /**
     * Disable create (data dari public)
     */
    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => ListContacts::route('/'),
            'edit'  => EditContact::route('/{record}/edit'),
        ];
    }
}
