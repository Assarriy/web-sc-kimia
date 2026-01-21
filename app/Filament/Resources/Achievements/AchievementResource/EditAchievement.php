<?php

namespace App\Filament\Resources\AchievementResource\Pages; // Namespace diperbaiki

use App\Filament\Resources\AchievementResource; // Use path diperbaiki
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAchievement extends EditRecord
{
    protected static string $resource = AchievementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}