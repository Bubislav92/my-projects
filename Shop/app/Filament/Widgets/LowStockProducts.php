<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\Product; // Uvezi Product model
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\SoftDeletingScope;

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
            // Dodajemo recordUrl kako bi ceo red bio klikabilan i reagovao na prelazak mišem
            ->recordUrl(fn (Product $record): string => route('filament.admin.resources.products.edit', $record))
            ->query(
                // Upit koji dohvaća proizvode
                // Po defaultu, sortiramo po količini od najmanje ka najvećoj
                Product::query()
                    ->orderBy('quantity')
                    ->limit(10) // <-- Ograničenje
            )
            ->columns([
                // Spatie Media Library Image Column - приказује слику у табели
                SpatieMediaLibraryImageColumn::make('product_images')
                    ->label('Image') // Етикета колоне
                    ->collection('product_images') // Назив колекције
                    ->conversion('thumb') // Приказује "thumb" конверзију слике (дефинисану у моделу)
                    ->circular(), // Приказује слику у кружном облику

                TextColumn::make('name')
                    ->label('Name') // Етикета колоне
                    ->searchable() // Омогућава претрагу по називу
                    ->sortable(), // Омогућава сортирање по називу

                TextColumn::make('category.name') // Приказује назив категорије кроз релацију
                    ->label('Category') // Етикета колоне
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price')
                    ->label('Price') // Етикета колоне
                    ->money('USD') // Форматира број као валуту са "RSD" префиксом
                    ->sortable(),

                TextColumn::make('discount_price')
                    ->label('Discount') // Етикета колоне
                    ->money('USD')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Колона је подразумевано скривена у табели

                TextColumn::make('quantity')
                    ->label('Quantity') // Етикета колоне
                    ->numeric() // Приказује као број
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Featured') // Етикета колоне
                    ->boolean(), // Приказује икону на основу boolean вредности (чек/икс)

                IconColumn::make('is_active')
                    ->label('Active') // Етикета колоне
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Created At') // Етикета колоне
                    ->dateTime() // Форматира као датум и време
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Филтери који се појављују изнад табеле
                SelectFilter::make('category_id')
                    ->label('Filter by Category') // Етикета филтера
                    ->relationship('category', 'name'), // Филтрира по релацији 'category' и приказује 'name'

                Filter::make('is_active')
                    ->label('Active Products')
                    ->query(fn (Builder $query): Builder => $query->where('is_active', true)),

                Filter::make('is_featured')
                    ->label('Featured Products')
                    ->query(fn (Builder $query): Builder => $query->where('is_featured', true)),
            ])
            ->actions([
                // Akcije dostupne za svaki red u tabeli
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Akcije koje se mogu primeniti na više odabranih redova istovremeno
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // Akcije koje se prikazuju kada je tabela prazna
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
