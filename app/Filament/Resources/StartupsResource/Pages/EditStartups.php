<?php

namespace App\Filament\Resources\StartupsResource\Pages;

use App\Filament\Resources\StartupsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStartups extends EditRecord
{
    protected static string $resource = StartupsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
