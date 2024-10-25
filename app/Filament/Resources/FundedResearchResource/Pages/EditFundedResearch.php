<?php

namespace App\Filament\Resources\FundedResearchResource\Pages;

use App\Filament\Resources\FundedResearchResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFundedResearch extends EditRecord
{
    protected static string $resource = FundedResearchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
