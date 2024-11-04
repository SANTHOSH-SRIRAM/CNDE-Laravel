<?php

namespace App\Filament\Resources\OurOutputResource\Pages;

use App\Filament\Resources\OurOutputResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOurOutput extends EditRecord
{
    protected static string $resource = OurOutputResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
