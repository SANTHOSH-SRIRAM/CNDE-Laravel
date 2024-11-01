<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenusResource\Pages;
use App\Models\Menus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MenusResource extends Resource
{
    protected static ?string $model = Menus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Menu Name'),

                // Repeater for Submenus
                Forms\Components\Repeater::make('submenus')  // Related submenus
                    ->relationship('submenus')  // Use the submenu relationship
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Submenu Name'),

                            Forms\Components\FileUpload::make('image')
                            ->label('Image'),
                        // Subparent Menu Name Input
                        Forms\Components\TextInput::make('subparent_name')
                            ->required()
                            ->label('Subparent Menu Name'),

                        // Add further customization here for child submenus if necessary
                    ])
                    ->createItemButtonLabel('Add Submenu') // Customize button
                    ->label('Submenus'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Menu Name'),

                // Display submenus in the table
                Tables\Columns\TextColumn::make('submenus.name')->label('Submenu Name'),

                Tables\Columns\TextColumn::make('submenus.subparent_name')->label('Submenu Name'),
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
            'index' => Pages\ListMenuses::route('/'),
            'create' => Pages\CreateMenus::route('/create'),
            'edit' => Pages\EditMenus::route('/{record}/edit'),
        ];
    }
}
