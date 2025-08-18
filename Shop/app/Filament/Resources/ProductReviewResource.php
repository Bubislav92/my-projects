<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductReviewResource\Pages;
use App\Filament\Resources\ProductReviewResource\RelationManagers;
use App\Models\ProductReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class ProductReviewResource extends Resource
{
    protected static ?string $model = ProductReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static ?string $navigationGroup = 'Shop';

    protected static ?string $navigationLabel = 'Product Reviews';

    protected static ?string $label = 'Product Review';

    protected static ?string $pluralLabel = 'Product Reviews';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Review Details')
                    ->columns(2)
                    ->schema([
                        // Polje za izbor korisnika
                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->label('User')
                            ->required()
                            ->searchable()
                            ->preload(),

                        // Polje za izbor proizvoda
                        Select::make('product_id')
                            ->relationship('product', 'name')
                            ->label('Product')
                            ->required()
                            ->searchable()
                            ->preload(),

                        // Polje za ocenu
                        Select::make('rating')
                            ->label('Rating')
                            ->options([
                                1 => '1 star',
                                2 => '2 stars',
                                3 => '3 stars',
                                4 => '4 stars',
                                5 => '5 stars',
                            ])
                            ->required(),

                        // Polje za tekst recenzije
                        Textarea::make('review_text')
                            ->label('Review Text')
                            ->placeholder('Enter the review text.')
                            ->columnSpan('full')
                            ->rows(4),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('User')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('product.name')
                    ->label('Product')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('rating')
                    ->label('Rating')
                    ->numeric()
                    ->sortable(),

                TextColumn::make('review_text')
                    ->label('Review Text')
                    ->searchable()
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filter po oceni
                Tables\Filters\SelectFilter::make('rating')
                    ->label('Filter by Rating')
                    ->options([
                        1 => '1 star',
                        2 => '2 stars',
                        3 => '3 stars',
                        4 => '4 stars',
                        5 => '5 stars',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListProductReviews::route('/'),
            'create' => Pages\CreateProductReview::route('/create'),
            'edit' => Pages\EditProductReview::route('/{record}/edit'),
        ];
    }
}