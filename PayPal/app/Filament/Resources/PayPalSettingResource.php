<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PayPalSettingResource\Pages;
use App\Filament\Resources\PayPalSettingResource\RelationManagers;
use App\Models\PayPalSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PayPalSettingResource extends Resource
{
    protected static ?string $model = PayPalSetting::class;

    protected static ?string $navigationGroup = 'Payment / PayPal';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Radio::make('mode')
                    ->label('Active Mode')
                    ->options([
                        'sandbox' => 'Sandbox (Test)',
                        'live' => 'Live (Production)',
                    ])
                    ->inline()
                    ->required(),

                    Section::make('Sandbox Credentials')
                        ->schema([
                            Forms\Components\TextInput::make('sandbox_client_id')->required(),
                            Forms\Components\TextInput::make('sandbox_secret')->required(),
                    ]),

                    Section::make('Live Credentials')
                        ->schema([
                            Forms\Components\TextInput::make('live_client_id')->required(),
                            Forms\Components\TextInput::make('live_secret')->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('mode')->label('Active Mode')->badge(),
                TextColumn::make('updated_at')->label('Last Updated')->since(),
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
            'index' => Pages\ListPayPalSettings::route('/'),
            'create' => Pages\CreatePayPalSetting::route('/create'),
            'edit' => Pages\EditPayPalSetting::route('/{record}/edit'),
        ];
    }
}
