<?php

namespace App\Filament\Resources\ProfessorsResource\Pages;

use App\Filament\Resources\ProfessorsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProfessors extends ListRecords
{
    protected static string $resource = ProfessorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
