<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResearchResource\Pages;
use App\Models\Menu;
use App\Models\Menus;
use App\Models\Research;
use App\Models\Submenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ResearchResource extends Resource
{
    protected static ?string $model = Research::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

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

                // Main form for research name
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Research Name'),

                // Repeater for methods stored as JSON
                Forms\Components\Repeater::make('methods')
                    ->schema([
                        Forms\Components\TextInput::make('method')
                            ->required()
                            ->label('Method Name'),

                        Forms\Components\FileUpload::make('photo')
                            ->required()
                            ->label('Photo'),

                        Forms\Components\Textarea::make('description')
                            ->label('Description'),

                    ])
                    ->createItemButtonLabel('Add Method')
                    ->label('Methods'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Display the research name

                Tables\Columns\TextColumn::make('menu.name')
                    ->label('Menu')
                    ->sortable()
                    ->searchable(),

                // Display the selected Submenu name
                Tables\Columns\TextColumn::make('submenu.name')
                    ->label('Submenu')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Research Name'),

                // Display the methods by joining the JSON array of methods

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListResearch::route('/'),
            'create' => Pages\CreateResearch::route('/create'),
            'edit' => Pages\EditResearch::route('/{record}/edit'),
        ];
    }
}
