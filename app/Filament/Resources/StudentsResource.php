<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentsResource\Pages;
use App\Filament\Resources\StudentsResource\RelationManagers;
use App\Models\Menus;
use App\Models\Students;
use App\Models\Submenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudentsResource extends Resource
{
    protected static ?string $model = Students::class;

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

                Forms\Components\Repeater::make('students')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Name'),

                        Forms\Components\FileUpload::make('photo')
                            ->required()
                            ->label('Photo'),

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

                        Forms\Components\Textarea::make('field')
                            ->required()
                            ->label('Field'),

                        Forms\Components\Textarea::make('guide')
                            ->required()
                            ->label('Guide'),

                    ])
                    ->createItemButtonLabel('Add Student')
                    ->label('Students'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('menu.name')
                    ->label('Menu Name')
                    ->sortable()
                    ->searchable(),
    
                Tables\Columns\TextColumn::make('submenu.name')
                    ->label('Submenu Name')
                    ->sortable()
                    ->searchable(),
    

    

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudents::route('/create'),
            'edit' => Pages\EditStudents::route('/{record}/edit'),
        ];
    }
}
