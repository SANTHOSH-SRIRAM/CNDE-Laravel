<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\Menus;
use App\Models\Products;
use App\Models\Submenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsResource extends Resource
{
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('menu_id')
                ->label('Menu')
                ->options(Menus::all()->pluck('name', 'id')) // Load menus
                ->required()
                ->reactive() // Make it reactive
                ->afterStateUpdated(function (callable $set) {
                    // Reset the submenu when the menu changes
                    $set('submenu_id', null);
                }),

            // Select field for Submenu Name
            Forms\Components\Select::make('submenu_id')
                ->label('Submenu')
                ->options(function (callable $get) {
                    $menuId = $get('menu_id'); // Get selected menu ID
                    if ($menuId) {
                        // Fetch submenus based on the selected menu
                        return Submenu::where('menu_id', $menuId)->pluck('name', 'id');
                    }
                    return Submenu::all()->pluck('name', 'id'); // Default case if no menu is selected
                })
                ->required(),

                Forms\Components\Repeater::make('products')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->label('Name'),

                    Forms\Components\FileUpload::make('photo')

                        ->label('Photo'),

                    Forms\Components\Textarea::make('description')
                        ->label('Description'),

                ])
                ->createItemButtonLabel('Add Product')
                ->label('Products'),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
