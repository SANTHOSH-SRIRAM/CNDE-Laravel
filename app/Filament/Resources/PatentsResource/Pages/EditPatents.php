<?php

namespace App\Filament\Resources\PatentsResource\Pages;

use App\Filament\Resources\PatentsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPatents extends EditRecord
{
    protected static string $resource = PatentsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
