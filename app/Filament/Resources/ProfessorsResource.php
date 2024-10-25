<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfessorsResource\Pages;
use App\Models\Professors;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProfessorsResource extends Resource
{
    protected static ?string $model = Professors::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Name'),

                Forms\Components\FileUpload::make('photo')
                    ->label('Photo')
                    ->image()
                    ->required(),

                Forms\Components\TextInput::make('designation')
                    ->required()
                    ->label('Designation'),
                    
// Additional Designations as JSON
                // Make 'additional_designation' a repeater
                Forms\Components\Repeater::make('additional_designation')
                    ->label('Additional Designations') // Change label to indicate multiple entries
                    ->schema([
                        Forms\Components\TextInput::make('designation_title')
                            ->required()
                            ->label('Designation Title'),

                    ])
                    ->minItems(1)  // Optional: Set minimum number of items
                    ->maxItems(5)  // Optional: Set maximum number of items
                    ->columns(2)   // Optional: Set the number of columns for the repeater
                    ->required(),  // Make repeater field required

                Forms\Components\TextInput::make('mail_id')
                    ->required()
                    ->label('Mail ID'),

                Forms\Components\TextInput::make('linkedin')
                    ->required()
                    ->label('LinkedIn'),

                Forms\Components\TextInput::make('google_scholar')
                    ->required()
                    ->label('Google Scholar'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Define table columns
                Tables\Columns\TextColumn::make('name')->label('Name'),
                Tables\Columns\TextColumn::make('designation')->label('Designation'),
                Tables\Columns\TextColumn::make('mail_id')->label('Mail ID'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfessors::route('/'),
            'create' => Pages\CreateProfessors::route('/create'),
            'edit' => Pages\EditProfessors::route('/{record}/edit'),
        ];
    }
}
