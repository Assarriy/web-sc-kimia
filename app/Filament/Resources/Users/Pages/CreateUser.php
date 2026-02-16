<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function mount(): void
    {
        parent::mount();

        $this->previousUrl = $this->getResourceUrl();
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResourceUrl();
    }
}
