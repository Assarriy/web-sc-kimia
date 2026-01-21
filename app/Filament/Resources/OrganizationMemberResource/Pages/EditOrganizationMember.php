<?php

namespace App\Filament\Resources\OrganizationMemberResource\Pages; // Namespace Baru

use App\Filament\Resources\OrganizationMemberResource; // Import Baru
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrganizationMember extends EditRecord
{
    protected static string $resource = OrganizationMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}