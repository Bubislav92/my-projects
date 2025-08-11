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
use Filament\Tables\Filters\SelectFilter; // Додато за филтере

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag'; // Икона за навигацију у Filament панелу

    protected static ?string $navigationGroup = 'Shop Management'; // Груписање у навигацији
    
    protected static ?int $navigationSort = 1; // Редослед приказа у навигацији

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Поља за преглед/уређивање поједине поруџбине
                Forms\Components\Select::make('user_id') // Повезивање са корисником
                    ->relationship('user', 'name') // 'user' је име релације, 'name' је поље за приказ
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Customer Name'),
                Forms\Components\TextInput::make('total_amount')
                    ->numeric()
                    ->prefix('$') // Приказ валуте
                    ->readOnly() // Износ се израчунава, не мења ручно
                    ->label('Total Amount'),
                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
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
                        'completed' => 'Commpleted',
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
            ->columns([
                TextColumn::make('id')->label('ID поруџбине')->searchable()->sortable(),
                TextColumn::make('user.name')->label('Име купца')->searchable()->sortable(), // Приказ имена корисника
                TextColumn::make('total_amount')->money('USD')->label('Укупан износ')->sortable(),
                TextColumn::make('status')
                    ->badge() // Приказује се као "баџ" (етикета)
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'processed' => 'info',
                        'shipped' => 'warning',
                        'delivered' => 'success',
                        'cancelled' => 'danger',
                    })
                    ->label('Статус поруџбине')->sortable(),
                TextColumn::make('payment_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'completed' => 'success',
                        'failed' => 'danger',
                        'refunded' => 'info',
                    })
                    ->label('Статус плаћања')->sortable(),
                TextColumn::make('payment_method')->label('Начин плаћања')->sortable(),
                TextColumn::make('transaction_id')->label('ID трансакције')->searchable(),
                TextColumn::make('created_at')->dateTime()->label('Датум поруџбине')->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'На чекању',
                        'processed' => 'Обрађено',
                        'shipped' => 'Послато',
                        'delivered' => 'Испоручено',
                        'cancelled' => 'Отказaно',
                    ])
                    ->label('Филтрирај по статусу'),
                SelectFilter::make('payment_status')
                    ->options([
                        'pending' => 'На чекању',
                        'completed' => 'Завршено',
                        'failed' => 'Неуспело',
                        'refunded' => 'Повраћај средстава',
                    ])
                    ->label('Филтрирај по статусу плаћања'),
                SelectFilter::make('payment_method')
                    ->options([
                        'paypal' => 'PayPal',
                        'stripe' => 'Stripe',
                        'cash_on_delivery' => 'Плаћање поузећем', // Ако имате и ову опцију
                    ])
                    ->label('Филтрирај по начину плаћања'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(), // Дугме за уређивање појединачне поруџбине
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Опција за масовно брисање
                ]),
            ]);
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