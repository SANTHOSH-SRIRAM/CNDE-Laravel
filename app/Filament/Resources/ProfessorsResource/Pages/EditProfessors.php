<?php

namespace App\Filament\Resources\ProfessorsResource\Pages;

use App\Filament\Resources\ProfessorsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfessors extends EditRecord
{
    protected static string $resource = ProfessorsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
