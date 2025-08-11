<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Filament\Resources\PaymentResource\RelationManagers;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;

    protected static ?string $navigationGroup = 'Payment / PayPal';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              TextInput::make('user_id')->disabled(),
              TextInput::make('payment_id')->disabled(),
              TextInput::make('capture_id')->disabled(),
              TextInput::make('payer_name')->disabled(),
              TextInput::make('payer_email')->disabled(),
              TextInput::make('product_name')->disabled(),
              TextInput::make('amount')->disabled(),
              TextInput::make('currency')->disabled(),
              Select::make('status')->options([
                  'completed' => 'Completed',
                  'cancelled' => 'Cancelled',
              ])->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('user_id')->label('User ID'),
                TextColumn::make('payment_id')->label('Payment ID')->searchable(),
                TextColumn::make('capture_id')->label("PayPal ID")->searchable(),
                TextColumn::make('payer_name')->label('Payer Name')->searchable(),
                TextColumn::make('payer_email')->label('Payer Email')->searchable(),
                TextColumn::make('product_name')->label('Product'),
                TextColumn::make('amount')->money('USD', true),
                TextColumn::make('status')->badge()->color(fn (string $state): string => match ($state) {
                'completed' => 'success',
                'cancelled' => 'danger',
                default => 'secondary',
                }),
            ])
            ->filters([
              SelectFilter::make('status')
              ->options([
                  'completed' => 'Completed',
                  'cancelled' => 'Cancelled',
              ]),
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
            'index' => Pages\ListPayments::route('/'),
            'create' => Pages\CreatePayment::route('/create'),
            'edit' => Pages\EditPayment::route('/{record}/edit'),
        ];
    }
}
