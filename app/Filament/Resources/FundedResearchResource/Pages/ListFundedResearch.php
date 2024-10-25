<?php

namespace App\Filament\Resources\FundedResearchResource\Pages;

use App\Filament\Resources\FundedResearchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFundedResearch extends ListRecords
{
    protected static string $resource = FundedResearchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
