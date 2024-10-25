<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientsResource\Pages;
use App\Models\Clients;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;

class ClientsResource extends Resource
{
    protected static ?string $model = Clients::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('section')
                    ->required()
                    ->maxLength(255),

                Repeater::make('logo_paths') // Use Repeater for multiple logos
                    ->schema([
                        FileUpload::make('logo') // For each logo
                            ->label('Upload Logo')
                            ->disk('public')
                            ->required(),
                    ])
                    ->minItems(1) // At least one logo is required
                    ->maxItems(30) // Max number of logos
                    ->label('Logos'), // Label for the repeater
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('section')
                    ->label('Section')
                    ->sortable()
                    ->searchable(),
                
                // Display logos as images
                Tables\Columns\TextColumn::make('logo_paths[]')
                ->label('Logos')

                
            ])
            ->filters([
                // Add any filters if needed
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClients::route('/create'),
            'edit' => Pages\EditClients::route('/{record}/edit'),
        ];
    }
}
