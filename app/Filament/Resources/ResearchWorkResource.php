<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ResearchWorkResource\Pages;
use App\Filament\Resources\ResearchWorkResource\RelationManagers;
use App\Models\ResearchWork;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ResearchWorkResource extends Resource
{
    protected static ?string $model = ResearchWork::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                ->required()
                ->label('Name'),

            Forms\Components\FileUpload::make('image')
                ->label('Image')
                ->image()
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->label('Name'),
                Tables\Columns\ImageColumn::make('image')->label('Image'),
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
            'index' => Pages\ListResearchWorks::route('/'),
            'create' => Pages\CreateResearchWork::route('/create'),
            'edit' => Pages\EditResearchWork::route('/{record}/edit'),
        ];
    }
}
