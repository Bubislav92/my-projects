<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
// Proveri da li su ove dve linije prisutne:
use Filament\Forms\Components\SpatieMediaLibraryFileUpload; // Ovo je za Spatie upload u formi
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
// Proveri da li je ova linija prisutna:
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn; // Ovo je za Spatie sliku u tabeli
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
// Proveri da li je ova linija prisutna:
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter; // Ovo je za ToggleFilter
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Catalog'; // Група у којој ће се производ налазити у навигацији

    protected static ?string $modelLabel = 'Product'; // Енглески назив модела у једнини
    protected static ?string $pluralModelLabel = 'Products'; // Енглески назив модела у множини


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3) // Главни грид контејнер који дели форму на 3 колоне
                    ->schema([
                        Section::make()
                            ->columnSpan(2) // Ова картица ће заузети 2 од 3 колоне на већим екранима
                            ->schema([
                                TextInput::make('name')
                                    ->label('Product Name') // Етикета поља
                                    ->required() // Поље је обавезно
                                    ->maxLength(255) // Максимална дужина текста
                                    ->live(onBlur: true) // Ажурира се "уживо" када корисник напусти поље (таб/клик)
                                    ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null), // Аутоматски генерише слаг при креирању

                                TextInput::make('slug')
                                    ->label('Slug (URL)') // Етикета поља
                                    ->required() // Поље је обавезно
                                    ->maxLength(255) // Максимална дужина текста
                                    ->unique(ignoreRecord: true), // Слаг мора бити јединствен (игнорише тренутни запис при ажурирању)

                                Select::make('category_id')
                                    ->label('Category') // Етикета поља
                                    ->relationship('category', 'name') // Дефинише релацију са 'Category' моделом, приказујући 'name'
                                    ->required() // Поље је обавезно
                                    ->searchable() // Омогућава претрагу у падајућем менију
                                    ->preload(), // Учитава све опције унапред (за мањи број категорија)

                                RichEditor::make('description')
                                    ->label('Description') // Етикета поља
                                    ->maxLength(65535) // Максимална дужина текста за дугачак опис
                                    ->columnSpanFull(), // Поље заузима целу ширину унутар своје картице

                                // Spatie Media Library File Upload компонента за управљање сликама
                                SpatieMediaLibraryFileUpload::make('product_images')
                                    ->label('Product Images') // Етикета поља
                                    ->collection('product_images') // Назив колекције медија (дефинисан у Product моделу)
                                    ->multiple() // Омогућава уплоад више слика за један производ
                                    ->image() // Осигурава да се могу уплоадовати само сликовни фајлови
                                    ->reorderable() // Омогућава кориснику да промени редослед слика превлачењем
                                    ->responsiveImages() // Опционо: Генерише различите величине слика за одзивни приказ
                                    ->helperText('The first image uploaded will be used as the main product thumbnail.') // Помоћни текст
                                    ->minFiles(1) // Опционо: Захтева најмање 1 слику
                                    ->maxFiles(5) // Опционо: Дозвољава максимум 5 слика по производу
                                    ->columnSpanFull(), // Заузима целу ширину
                            ]),
                        Section::make()
                            ->columnSpan(1) // Ова картица ће заузети 1 од 3 колоне на већим екранима
                            ->schema([
                                TextInput::make('price')
                                    ->label('Price') // Етикета поља
                                    ->required() // Поље је обавезно
                                    ->numeric() // Омогућава само нумерички унос
                                    ->prefix('USD') // Додаје префикс "RSD" испред вредности
                                    ->rules(['regex:/^\d{1,8}(\.\d{2})?$/']), // Regex валидација за формат цене (нпр. 12345678.99)

                                TextInput::make('discount_price')
                                    ->label('Discount Price') // Етикета поља
                                    ->numeric() // Омогућава само нумерички унос
                                    ->prefix('USD')
                                    ->rules(['regex:/^\d{1,8}(\.\d{2})?$/'])
                                    ->nullable(), // Поље није обавезно (може бити празно)

                                TextInput::make('quantity')
                                    ->label('Quantity') // Етикета поља
                                    ->required() // Поље је обавезно
                                    ->numeric() // Омогућава само нумерички унос
                                    ->minValue(0) // Минимална вредност је 0
                                    ->default(0), // Подразумевана вредност је 0

                                Toggle::make('is_featured')
                                    ->label('Featured Product') // Етикета поља
                                    ->helperText('Displays on the homepage as a "Top Pick".') // Помоћни текст
                                    ->default(false), // Подразумевана вредност је false

                                Toggle::make('is_active')
                                    ->label('Active') // Етикета поља
                                    ->helperText('Determines if the product is visible on the website.') // Помоћни текст
                                    ->default(true), // Подразумевана вредност је true
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                    ->label('Active Products'), // Етикета филтера
                
                Filter::make('is_featured')
                    ->label('Featured Products'), // Етикета филтера

                    ])
            ->actions([
                // Акције доступне за сваки ред у табели
                Tables\Actions\EditAction::make(), // Акција за измену записа
                Tables\Actions\DeleteAction::make(), // Акција за брисање записа
            ])
            ->bulkActions([
                // Акције које се могу применити на више одабраних редова истовремено
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Акција за масовно брисање
                ]),
            ])
            ->emptyStateActions([
                // Акције које се приказују када је табела празна
                Tables\Actions\CreateAction::make(), // Акција за креирање новог записа
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
