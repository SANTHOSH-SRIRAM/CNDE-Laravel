<?php

namespace App\Filament\Resources\EquipementsResource\Pages;

use App\Filament\Resources\EquipementsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEquipements extends EditRecord
{
    protected static string $resource = EquipementsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
