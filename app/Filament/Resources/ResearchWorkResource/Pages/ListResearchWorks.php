<?php

namespace App\Filament\Resources\ResearchWorkResource\Pages;

use App\Filament\Resources\ResearchWorkResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResearchWorks extends ListRecords
{
    protected static string $resource = ResearchWorkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
