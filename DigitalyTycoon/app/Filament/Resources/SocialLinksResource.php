<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SocialLinksResource\Pages;
use App\Filament\Resources\SocialLinksResource\RelationManagers;
use App\Models\SocialLinks;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SocialLinksResource extends Resource
{
    protected static ?string $model = SocialLinks::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('facebook')
                    ->label('Facebook URL')
                    ->url()
                    ->maxLength(255),
                TextInput::make('twitter')
                    ->label('Twitter URL')
                    ->url()
                    ->maxLength(255),
                TextInput::make('tiktok')
                    ->label('TikTok URL')
                    ->url()
                    ->maxLength(255),
                TextInput::make('instagram')
                    ->label('Instagram URL')
                    ->url()
                    ->maxLength(255),
                TextInput::make('linkedin')
                    ->label('LinkedIn URL')
                    ->url()
                    ->maxLength(255),
                TextInput::make('google_plus')
                    ->label('Google + URL')
                    ->url()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('facebook'),
                TextColumn::make('twitter'),
                TextColumn::make('tiktok'),
                TextColumn::make('instagram'),
                TextColumn::make('linkedin'),
                TextColumn::make('google_plus'),
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
            'index' => Pages\ListSocialLinks::route('/'),
            'create' => Pages\CreateSocialLinks::route('/create'),
            'edit' => Pages\EditSocialLinks::route('/{record}/edit'),
        ];
    }
}
