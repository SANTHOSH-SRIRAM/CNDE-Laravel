<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DiscoverResource\Pages;
use App\Filament\Resources\DiscoverResource\RelationManagers;
use App\Models\Discover;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DiscoverResource extends Resource
{
    protected static ?string $model = Discover::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Repeater for the discovers
                Forms\Components\Repeater::make('discovers')
                    ->schema([
                        Forms\Components\TextInput::make('section_name')
                            ->required()
                            ->label('Section Name'),

                        Forms\Components\FileUpload::make('images')
                            ->label('Image')
                            ->image()
                            ->required(), // Set to required if you want to enforce image upload

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->label('Description'),
                    ])
                    ->createItemButtonLabel('Add Discover') // Customize button
                    ->label('Discover the Latest')
                    ->required(), // Ensure at least one discover entry is required
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('discovers.*.section_name')
                    ->label('Section Name'),
    
                Tables\Columns\ImageColumn::make('discovers.*.images')
                    ->label('Image')
                    ->disk('public'), // Specify the disk if using FileUpload
    
                Tables\Columns\TextColumn::make('discovers.*.description')
                    ->label('Description')
                    ->limit(50),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }
    
    
    
    

    public static function getRelations(): array
    {
        return [
            // Define any relationships if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDiscovers::route('/'),
            'create' => Pages\CreateDiscover::route('/create'),
            'edit' => Pages\EditDiscover::route('/{record}/edit'),
        ];
    }
}
