<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\Concerns\Translatable;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\Str;


class ProductResource extends Resource
{
    use Translatable;

    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // LEVA KOLONA (Prevodivi i opšti detalji)
                Section::make('Detalji Proizvoda')
                    ->description('Unesite naziv, opis i SEO informacije na svim jezicima.')
                    ->schema([
                        // Prevodiva polja - automatski će dobiti jezički svitcher
                        
                        TextInput::make('name')
                        ->label('Naziv Proizvoda')
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function ($state, callable $set) {
                            $set('slug', Str::slug($state));
                        }),


                         TextInput::make('slug')
                            ->label('SEO Slug')
                            ->disabled() // korisnik ne menja ručno
                            ->dehydrated() // i dalje se čuva u bazi
                            ->unique(Product::class, 'slug', ignoreRecord: true)
                            ->afterStateHydrated(function ($component, $state, $record) {
                                // Ako editujemo postojeći zapis, zadrži slug
                                if ($record && $record->slug) {
                                    $component->state($record->slug);
                                }
                            })
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                // Obezbeđuje da slug ostane čist
                                $set('slug', Str::slug($get('name')));
                            })
                            ->helperText('Automatski se generiše iz naziva.'),
                        

                        TextInput::make('short_description')
                            ->label('Kratak Opis za Kartice'),
                        
                        RichEditor::make('description')
                            ->label('Detaljan Opis'),
                            
                        // Specifikacije (neprevodive)
                        TextInput::make('technologies')
                            ->label('Korišćene Tehnologije (npr. Laravel 11, Tailwind 3)'),
                    ])
                    ->columns(1)
                    ->columnSpan(['lg' => 2]), // Zauzima 2/3 širine na većim ekranima
                
                
                // DESNA KOLONA (Finansije i Status)
                Section::make('Status i Fajlovi')
                    ->description('Cena, slike i status objave.')
                    ->schema([
                        
                        // Finansije
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$')
                            ->label('Cena'),

                        TextInput::make('discount_price')
                            ->numeric()
                            ->prefix('$')
                            ->nullable()
                            ->label('Cena sa Popustom'),
                        
                        TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->label('Redosled (Sort Order)'),
                        
                        // Status
                        Toggle::make('is_published')
                            ->label('Objavljeno na Sajtu')
                            ->default(true),

                        // Linkovi i Fajlovi (Koristićemo klasičan FileUpload jer ste podesili 512MB)
                        TextInput::make('demo_url')
                            ->label('Link za Probnu Verziju (Demo)')
                            ->url()
                            ->columnSpanFull(),

                        FileUpload::make('image_url') 
                            ->label('Glavna Slika Proizvoda (Preview)')
                            ->image()
                            ->disk('public')
                            ->directory('product-previews')
                            ->columnSpanFull(),
                            
                        /*
                            FileUpload::make('download_path') 
                            ->label('Fajl za Preuzimanje (ZIP, RAR)')
                            ->disk('private')
                            ->directory('product-downloads')
                            ->columnSpanFull(),
                        */

                             // *** AŽURIRANO OVDE ***
                        TextInput::make('download_path') 
                        ->label('Putanja projekta (npr. templates/product_a.zip)')
                        ->helperText('Putanja unutar storage/app, gde ste ručno postavili fajl.')
                        ->required()
                        ->columnSpanFull(),
                        // *** KRAJ AŽURIRANJA ***
                        
                    ])
                    ->columns(1)
                    ->columnSpan(['lg' => 1]), // Zauzima 1/3 širine na većim ekranima

            ])
            ->columns(3); // Ukupno 3 kolone (2 za levi, 1 za desni deo)
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Naziv Proizvoda')
                    ->sortable()
                    ->searchable(), // Filament automatski pretražuje po prevodima
                
                TextColumn::make('slug')
                    ->label('Slug')
                    ->searchable(),

                TextColumn::make('price')
                    ->label('Cena')
                    ->money('USD') // Prikazuje kao valutu
                    ->sortable(),

                IconColumn::make('is_published')
                    ->label('Objavljeno')
                    ->boolean()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
