<?php

namespace App\Filament\Resources\DiscoverResource\Pages;

use App\Filament\Resources\DiscoverResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDiscovers extends ListRecords
{
    protected static string $resource = DiscoverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
