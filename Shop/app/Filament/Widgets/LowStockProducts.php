<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Product; // Uvezi Product model
use Illuminate\Database\Eloquent\Builder;

class LowStockProducts extends BaseWidget
{
    // Naslov widgeta koji će biti prikazan na Dashboardu
    protected static ?string $heading = 'Low Stock Products';

    protected int | string | array $columnSpan = 'full';

    // Opciono: Redosled widgeta na Dashboardu
    protected static ?int $sort = 4;

    // Metoda za definisanje tabele
    public function table(Table $table): Table
    {
        return $table
            ->query(
                // Upit koji dohvaća proizvode
                // Po defaultu, sortiramo po količini od najmanje ka najvećoj
                Product::query()
                    ->orderBy('quantity')
            )
            ->columns([
                // Kolona za ime proizvoda
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                // Kolona za količinu, sa različitim bojama u zavisnosti od stanja
                Tables\Columns\TextColumn::make('quantity')
                    ->sortable()
                    ->color(fn (string $state): string => match (true) {
                        $state <= 10 => 'danger', // Crvena za količinu <= 10
                        $state <= 20 => 'warning', // Žuta za količinu <= 20
                        default => 'success', // Zelena za količinu > 20
                    }),

                // Kolona za cenu proizvoda
                Tables\Columns\TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),

                // Kolona za kategoriju proizvoda
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                // Filter za prikaz samo proizvoda sa niskim zalihama
                Tables\Filters\Filter::make('Low Stock')
                    ->query(fn (Builder $query): Builder => $query->where('quantity', '<=', 10))
            ])
            ->actions([
                // Opciona akcija: link ka stranici za uređivanje proizvoda
                Tables\Actions\Action::make('edit')
                    ->url(fn (Product $record): string => route('filament.admin.resources.products.edit', $record))
                    ->icon('heroicon-o-pencil-square')
                    ->color('info')
            ])
            ->defaultSort('quantity', 'asc'); // Podrazumevano sortiranje
    }
}