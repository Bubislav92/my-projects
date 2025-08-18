<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Shop Management';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Customer Name'),
                Forms\Components\TextInput::make('total_amount')
                    ->numeric()
                    ->prefix('$')
                    ->readOnly()
                    ->label('Total Amount'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'processed' => 'Processed',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Canceled',
                    ])
                    ->required()
                    ->label('Order Status'),
                Forms\Components\Select::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ])
                    ->required()
                    ->label('Payment Status'),
                Forms\Components\TextInput::make('payment_method')
                    ->maxLength(255)
                    ->readOnly()
                    ->label('Payment Way'),
                Forms\Components\TextInput::make('transaction_id')
                    ->maxLength(255)
                    ->label('ID Transaction'),
                Forms\Components\TextInput::make('shipping_address_line1')
                    ->maxLength(255)
                    ->label('Address'),
                Forms\Components\TextInput::make('shipping_city')
                    ->maxLength(255)
                    ->label('City'),
                Forms\Components\TextInput::make('shipping_zip_code')
                    ->maxLength(255)
                    ->label('Zip Code'),
                Forms\Components\TextInput::make('shipping_country')
                    ->maxLength(255)
                    ->label('Country'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->recordUrl(fn (Order $record): string => route('filament.admin.resources.orders.edit', $record))
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->sortable()
                    ->extraAttributes([
                        'class' => 'font-bold text-gray-800 dark:text-gray-200'
                    ]),
                TextColumn::make('user.name')
                    ->label('Customer Name')
                    ->searchable()
                    ->sortable()
                    ->extraAttributes([
                        'class' => 'text-gray-700 dark:text-gray-400'
                    ]),
                TextColumn::make('total_amount')
                    ->label('Total Amount')
                    ->money('USD')
                    ->sortable()
                    ->extraAttributes([
                        'class' => 'text-gray-700 dark:text-gray-400'
                    ]),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'pending' => 'warning',     // žuta
                        'processing' => 'info',     // plava
                        'processed' => 'info',      // takođe plava
                        'shipped' => 'warning',     // narandžasta/žuta
                        'delivered' => 'success',   // zelena
                        'cancelled' => 'danger',    // crvena
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'pending' => 'gray',
                        'completed' => 'success',
                        'failed' => 'danger',
                        'refunded' => 'info',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('payment_method')
                    ->label('Payment Method')
                    ->badge()
                    ->color(fn (?string $state): string => match ($state) {
                        'stripe' => 'success',
                        'paypal' => 'info',
                        'cash_on_delivery' => 'warning',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('transaction_id')
                    ->label('Transaction ID')
                    ->searchable()
                    ->extraAttributes([
                        'class' => 'text-gray-700 dark:text-gray-400'
                    ]),
                TextColumn::make('created_at')
                    ->label('Order Date')
                    ->dateTime()
                    ->sortable()
                    ->extraAttributes([
                        'class' => 'text-gray-700 dark:text-gray-400'
                    ]),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processing' => 'Processing',
                        'processed' => 'Processed',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Canceled',
                    ])
                    ->label('Filter by Status'),
                SelectFilter::make('payment_status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'failed' => 'Failed',
                        'refunded' => 'Refunded',
                    ])
                    ->label('Filter by Payment Status'),
                SelectFilter::make('payment_method')
                    ->options([
                        'paypal' => 'PayPal',
                        'stripe' => 'Stripe',
                        'cash_on_delivery' => 'Cash on Delivery',
                    ])
                    ->label('Filter by Payment Method'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->striped();
    }

    public static function getRelations(): array
    {
        return [
            // Овде можете додати релације, нпр. за OrderItems
            // RelationManagers\OrderItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
