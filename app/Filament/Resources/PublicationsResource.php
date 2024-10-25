<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PublicationsResource\Pages;
use App\Models\Publications;
use App\Services\GoogleScholarServices;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Log;

class PublicationsResource extends Resource
{
    protected static ?string $model = Publications::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('author_id')
                    ->required()
                    ->label('Author ID'),
                Forms\Components\Button::make('Fetch Publications')
                    ->action(function (array $data) {
                        Log::info('Fetch Publications button clicked');
                        
                        $googleScholarService = new GoogleScholarServices();
                        $publicationsData = $googleScholarService->getPublications($data['author_id']);
                        
                        Log::info('Fetched Publications Response:', $publicationsData); // Log full response
                        
                        if ($publicationsData && isset($publicationsData['articles'])) {
                            foreach ($publicationsData['articles'] as $publication) {
                                $authors = $publication['authors'] ?? 'Unknown Authors'; // Safely access the 'authors' field
                                
                                // Log the authors for debugging
                                Log::info('Authors:', ['authors' => $authors]);
    
                                // Now save the publication along with the authors to the database
                                Publications::updateOrCreate(
                                    ['title' => $publication['title']], // Use title to avoid duplicates
                                    [
                                        'citation_count' => $publication['cited_by'] ?? 0,
                                        'publication_year' => $publication['year'] ?? null,
                                        'author_name' => $authors, // Store the authors
                                    ]
                                );
                            }
                            $this->notify('success', 'Publications fetched and saved successfully!');
                        } else {
                            $this->notify('error', 'No publications found or an error occurred.');
                        }
                    }),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Title'),
                Tables\Columns\TextColumn::make('citation_count')->label('Citations'),
                Tables\Columns\TextColumn::make('publication_year')
                ->label('Publication Year')                
                ->sortable()
                ->searchable(),
                
                Tables\Columns\TextColumn::make('author_name') // Add author name
                ->label('Authors')
                ->sortable()
                ->searchable(),
            ])
            ->filters([])
            ->actions([Tables\Actions\EditAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])])
            ->query(Publications::query()); // Load data from the Publications model
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPublications::route('/'),
            'create' => Pages\CreatePublications::route('/create'),
            'edit' => Pages\EditPublications::route('/{record}/edit'),
        ];
    }
}
