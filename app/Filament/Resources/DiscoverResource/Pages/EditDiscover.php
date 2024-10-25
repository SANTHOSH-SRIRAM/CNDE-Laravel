<?php

namespace App\Filament\Resources\DiscoverResource\Pages;

use App\Filament\Resources\DiscoverResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiscover extends EditRecord
{
    protected static string $resource = DiscoverResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
