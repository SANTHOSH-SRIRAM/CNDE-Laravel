<?php

namespace App\Filament\Resources\PatentsResource\Pages;

use App\Filament\Resources\PatentsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPatents extends ListRecords
{
    protected static string $resource = PatentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
