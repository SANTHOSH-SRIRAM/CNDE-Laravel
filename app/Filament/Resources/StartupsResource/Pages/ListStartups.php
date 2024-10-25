<?php

namespace App\Filament\Resources\StartupsResource\Pages;

use App\Filament\Resources\StartupsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStartups extends ListRecords
{
    protected static string $resource = StartupsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
