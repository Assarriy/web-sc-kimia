<?php

namespace App\Filament\Resources\OrganizationMemberResource\Pages; // Namespace Baru

use App\Filament\Resources\OrganizationMemberResource; // Import Baru
use Filament\Resources\Pages\CreateRecord;

class CreateOrganizationMember extends CreateRecord
{
    protected static string $resource = OrganizationMemberResource::class;
}