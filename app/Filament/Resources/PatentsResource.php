<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatentsResource\Pages;
use App\Filament\Resources\PatentsResource\RelationManagers;
use App\Models\Patents;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatentsResource extends Resource
{
    protected static ?string $model = Patents::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('title')
                ->required()
                ->label('Patent Title'),

                Forms\Components\TextInput::make('inventors')
                ->required()
                ->label('Inventors'),

                Forms\Components\DatePicker::make('priority_Date')
                ->required()
                ->label('Priority Date'),

                Forms\Components\TextInput::make('country')
                ->required()
                ->label('Country'),

                Forms\Components\TextInput::make('reference')
                ->required()
                ->label('Reference'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('id')->label('S.No'),

                // Display submenus in the table
                Tables\Columns\TextColumn::make('title')->label('Title'),
                
                Tables\Columns\TextColumn::make('inventors')->label('Inventors'),

                Tables\Columns\TextColumn::make('priority_Date')
                    ->label('Priority Date')
                    ->formatStateUsing(function ($state) {
                        return \Carbon\Carbon::parse($state)->format('F j, Y');
                    }),

                Tables\Columns\TextColumn::make('country')->label('Country'),

                Tables\Columns\TextColumn::make('reference')->label('Reference'),

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
            'index' => Pages\ListPatents::route('/'),
            'create' => Pages\CreatePatents::route('/create'),
            'edit' => Pages\EditPatents::route('/{record}/edit'),
        ];
    }
}
