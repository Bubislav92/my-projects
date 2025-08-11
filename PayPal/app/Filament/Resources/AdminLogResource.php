<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdminLogResource\Pages;
use App\Filament\Resources\AdminLogResource\RelationManagers;
use App\Models\AdminLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdminLogResource extends Resource
{
    protected static ?string $model = AdminLog::class;

    protected static ?string $navigationGroup = 'Payment / PayPal';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id')->label('ID')->disabled(),
                TextInput::make('refund_request_id')->label('Refund Request ID')->disabled(),
                TextInput::make('admin_id')->label('Admin ID')->disabled(),
                TextInput::make('action')->label('Action')->disabled(),
                TextInput::make('created_at')->label('Created At')->disabled(),
                TextInput::make('updated_at')->label('Updated At')->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('refund_request_id')->label('Refund Request ID'),
                TextColumn::make('admin_id')->label('Admin ID'),
                TextColumn::make('action')->label('Action'),
                TextColumn::make('created_at')->label('Created At'),
                TextColumn::make('updated_at')->label('Updated At'),
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
            'index' => Pages\ListAdminLogs::route('/'),
            'create' => Pages\CreateAdminLog::route('/create'),
            'edit' => Pages\EditAdminLog::route('/{record}/edit'),
        ];
    }
}
