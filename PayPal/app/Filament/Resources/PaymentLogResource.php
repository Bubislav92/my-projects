<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentLogResource\Pages;
use App\Filament\Resources\PaymentLogResource\RelationManagers;
use App\Models\PaymentLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\DateTimeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentLogResource extends Resource
{
    protected static ?string $model = PaymentLog::class;

    protected static ?string $navigationGroup = 'Payment / PayPal';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id'),
                TextInput::make('user_id')->disabled(),
                TextInput::make('payment_id')->disabled(),
                TextInput::make('capture_id')->disabled(),
                TextInput::make('product_name')->disabled(),
                TextInput::make('amount')->disabled(),
                TextInput::make('currency')->disabled(),
                TextInput::make('status')->disabled(),
                TextInput::make('event')->disabled(),
                TextInput::make('payload')->disabled(),
                TextInput::make('created_at')->disabled(),
                TextInput::make('updated_at')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable(),
                TextColumn::make('user_id')->label('User ID'),
                TextColumn::make('payment_id')->label('Payment ID')->searchable(),
                TextColumn::make('capture_id')->label('Capture ID')->searchable(),
                TextColumn::make('product_name')->label('Product Name')->searchable(),
                TextColumn::make('amount')->label('Amount')->money('usd', true)->sortable(),
                TextColumn::make('currency')->label('Currency')->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'completed' => 'success',
                        'failed' => 'danger',
                        'pending' => 'warning',
                        'cancelled' => 'secondary',
                    ]),
                TextColumn::make('event')->label('Event')->sortable(),
                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d.m.Y H:i') // formatiranje datuma
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('d.m.Y H:i') // formatiranje datuma
                    ->sortable(),

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
            'index' => Pages\ListPaymentLogs::route('/'),
            'create' => Pages\CreatePaymentLog::route('/create'),
            'edit' => Pages\EditPaymentLog::route('/{record}/edit'),
        ];
    }
}
