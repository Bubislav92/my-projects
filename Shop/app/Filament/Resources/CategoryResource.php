<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Section; // Koristimo Section umesto Card
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload; // Za upload slike
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set; // Za slug generaciju
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn; // Za prikaz slike
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter; // Za Filter::make()->toggle()
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str; // Za Str::slug

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag'; // Ikona za kategorije

    protected static ?string $navigationGroup = 'Catalog'; // Ista grupa kao za proizvode

    protected static ?string $modelLabel = 'Category';
    protected static ?string $pluralModelLabel = 'Categories';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3) // Glavni grid kontejner koji deli formu na 3 kolone
                    ->schema([
                        Section::make()
                            ->columnSpan(2) // Ova kartica će zauzeti 2 od 3 kolone
                            ->schema([
                                TextInput::make('name')
                                    ->label('Category Name') // Etiketa polja
                                    ->required() // Polje je obavezno
                                    ->maxLength(255) // Maksimalna dužina teksta
                                    ->live(onBlur: true) // Ažurira se "uživo" kada korisnik napusti polje
                                    ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null), // Automatski generiše slug pri kreiranju

                                TextInput::make('slug')
                                    ->label('Slug (URL)') // Etiketa polja
                                    ->required() // Polje je obavezno
                                    ->maxLength(255) // Maksimalna dužina teksta
                                    ->unique(ignoreRecord: true), // Slug mora biti jedinstven (ignoriše trenutni zapis pri ažuriranju)

                                // Spatie Media Library File Upload komponenta za sliku kategorije
                                SpatieMediaLibraryFileUpload::make('category_image') // Naziv polja (može biti bilo šta, npr. 'main_image')
                                    ->label('Category Image') // Etiketa polja
                                    ->collection('category_images') // NAZIV KOLEKCIJE: Mora se poklapati sa `addMediaCollection()` u modelu
                                    ->image() // Osigurava da se mogu uploadovati samo slikovni fajlovi
                                    // Uklonjeno: ->multiple() - jer želimo samo jednu sliku
                                    // Uklonjeno: ->reorderable() - jer nema više slika za premeštanje
                                    // Uklonjeno: ->minFiles() / ->maxFiles() - jer singleFile() već implicitno postavlja 1
                                    ->responsiveImages() // Opciono: Generiše različite veličine slika za odzivni prikaz
                                    ->helperText('Upload a single image for the category thumbnail.') // Pomoćni tekst
                                    ->directory('category-images') // Opciono: Slike će biti u storage/app/public/category-images/...
                                    ->columnSpanFull(), // Zauzima celu širinu
                            ]),
                        Section::make()
                            ->columnSpan(1) // Ova kartica će zauzeti 1 od 3 kolone
                            ->schema([
                                Toggle::make('is_active')
                                    ->label('Active') // Etiketa polja
                                    ->helperText('Determines if the category is visible on the website.') // Pomoćni tekst
                                    ->default(true), // Podrazumevana vrednost je true
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Spatie Media Library Image Column - prikazuje sliku kategorije
                SpatieMediaLibraryImageColumn::make('category_image') // Ime fielda/kolekcije
                    ->label('Image') // Etiketa kolone
                    ->collection('category_images') // NAZIV KOLEKCIJE: Mora se poklapati sa onim u modelu i formi
                    ->conversion('thumb') // Prikazuje "thumb" konverziju slike (definisana u modelu)
                    ->circular(), // Prikazuje sliku u kružnom obliku

                TextColumn::make('name')
                    ->label('Name') // Etiketa kolone
                    ->searchable() // Omogućava pretragu po nazivu
                    ->sortable(), // Omogućava sortiranje po nazivu

                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true), // Kolona je podrazumevano skrivena

                IconColumn::make('is_active')
                    ->label('Active') // Etiketa kolone
                    ->boolean(), // Prikazuje ikonu na osnovu boolean vrednosti (ček/iks)

                TextColumn::make('created_at')
                    ->label('Created At') // Etiketa kolone
                    ->dateTime() // Formatira kao datum i vreme
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filteri koji se pojavljuju iznad tabele
                Filter::make('is_active')
                    ->label('Active Categories') // Etiketa filtera
                    ->toggle(), // Pretvara ga u toggle filter
            ])
            ->actions([
                // Akcije dostupne za svaki red u tabeli
                Tables\Actions\EditAction::make(), // Akcija za izmenu zapisa
                Tables\Actions\DeleteAction::make(), // Akcija za brisanje zapisa
            ])
            ->bulkActions([
                // Akcije koje se mogu primeniti na više odabranih redova istovremeno
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(), // Akcija za masovno brisanje
                ]),
            ])
            ->emptyStateActions([
                // Akcije koje se prikazuju kada je tabela prazna
                Tables\Actions\CreateAction::make(), // Akcija za kreiranje novog zapisa
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Ovde možete dodati Relation Managers ako vam budu potrebni
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    // Dodato: Omogućava globalnu pretragu kategorija po nazivu i slugu
    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'slug'];
    }
}