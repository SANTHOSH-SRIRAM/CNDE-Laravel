<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StartupsResource\Pages;
use App\Filament\Resources\StartupsResource\RelationManagers;
use App\Models\Menu;
use App\Models\Menus;
use App\Models\Startups;
use App\Models\Submenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StartupsResource extends Resource
{
    protected static ?string $model = Startups::class;

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

                Forms\Components\FileUpload::make('logo')
                ->required()

                    ->label('Logo'),

                Forms\Components\Textarea::make('vision')
                    ->required()
                    ->label('Vision'),

                Forms\Components\Textarea::make('mission')
                    ->required()
                    ->label('Mission'),

                Forms\Components\Textarea::make('about')
                    ->required()
                    ->label('About'),


                // Repeater for members

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Display the selected Menu name
                Tables\Columns\TextColumn::make('menu.name')
                    ->label('Menu')
                    ->sortable()
                    ->searchable(),
    
                // Display the selected Submenu name
                Tables\Columns\TextColumn::make('submenu.name')
                    ->label('Submenu')
                    ->sortable()
                    ->searchable(),
    
                // Display the Logo
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo'),
    
                // Display Vision
                Tables\Columns\TextColumn::make('vision')
                    ->label('Vision')
                    ->limit(50), // Limit the text length for table display
    
                // Display Mission
                Tables\Columns\TextColumn::make('mission')
                    ->label('Mission')
                    ->limit(50), // Limit the text length for table display
    
                // Display About
                Tables\Columns\TextColumn::make('about')
                    ->label('About')
                    ->limit(50), // Limit the text length for table display
            ])
            ->filters([
                // You can add any filters here if needed
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
            'index' => Pages\ListStartups::route('/'),
            'create' => Pages\CreateStartups::route('/create'),
            'edit' => Pages\EditStartups::route('/{record}/edit'),
        ];
    }
}
