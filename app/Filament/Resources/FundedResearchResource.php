<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FundedResearchResource\Pages;
use App\Filament\Resources\FundedResearchResource\RelationManagers;
use App\Models\FundedResearch;
use App\Models\Menus;
use App\Models\Submenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FundedResearchResource extends Resource
{
    protected static ?string $model = FundedResearch::class;

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
                
            // Date range selection (From Year and To Year)
            Forms\Components\DatePicker::make('from_year')
                ->label('From Year')
                ->displayFormat('Y') // Display only the year
                ->format('Y') // Store only the year
                ->required(),

            Forms\Components\DatePicker::make('to_year')
                ->label('To Year')
                ->displayFormat('Y') // Display only the year
                ->format('Y') // Store only the year
                ->required()
                ->afterStateUpdated(function ($state, callable $set, callable $get) {
                    // Ensure the "To Year" is not earlier than "From Year"
                    $fromYear = $get('from_year');
                    if ($state < $fromYear) {
                        $set('to_year', $fromYear); // Adjust "To Year" to match "From Year" if it's earlier
                    }
                }),

                Forms\Components\TextInput::make('agency')
                ->required()
                ->label('Agency'),

                Forms\Components\TextInput::make('topic')
                ->required()
                ->label('Topic'),

                Forms\Components\TextInput::make('status')
                ->required()
                ->label('Status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //

            Tables\Columns\TextColumn::make('period')
            ->label('Period')
            ->getStateUsing(function ($record) {
                return $record->from_year . ' - ' . $record->to_year;
            })
            ->sortable(), // Make the column sortable based on the period

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
            'index' => Pages\ListFundedResearch::route('/'),
            'create' => Pages\CreateFundedResearch::route('/create'),
            'edit' => Pages\EditFundedResearch::route('/{record}/edit'),
        ];
    }
}
