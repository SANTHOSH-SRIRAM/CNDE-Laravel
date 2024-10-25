<?php

namespace App\Filament\Resources\EquipementsResource\Pages;

use App\Filament\Resources\EquipementsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEquipements extends ListRecords
{
    protected static string $resource = EquipementsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
