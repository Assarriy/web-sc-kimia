<?php

namespace App\Filament\Resources\AchievementResource\Pages; // Namespace diperbaiki

use App\Filament\Resources\AchievementResource; // Use path diperbaiki
use Filament\Resources\Pages\CreateRecord;

class CreateAchievement extends CreateRecord
{
    protected static string $resource = AchievementResource::class;
}