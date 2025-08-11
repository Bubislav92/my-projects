<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn; // Obavezno TextColumn za bedževe
// NEMA use Filament\Tables\Columns\BadgeColumn; - ovo je zastarelo i obrisano
// NEMA use Filament\Support\Colors\Color; - ovo nam ne treba ako koristimo stringove za boje

use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash; // Za hashovanje lozinke

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users'; // Ikona za korisnike
    protected static ?string $navigationGroup = 'Shop Management'; // Grupa u navigaciji
    protected static ?int $navigationSort = 1; // Redosled unutar grupe (npr. korisnici prvi)

    protected static ?string $modelLabel = 'User';
    protected static ?string $pluralModelLabel = 'Users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('User Details')
                    ->description('Basic information and authentication credentials.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('email')
                            ->label('Email Address')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true), // Mora biti jedinstven (ignoriše trenutnog korisnika pri izmeni)

                        // Polje za lozinku
                        // Lozinka se automatski hash-uje zbog 'password' => 'hashed' u User modelu
                        TextInput::make('password')
                            ->label('Password')
                            ->password() // Sakriva unos
                            ->revealable() // Omogućava prikaz lozinke klikom na ikonicu oka
                            ->maxLength(255)
                            // dehydratationStateUsing NIJE POTREBNO ako je u modelu 'password' => 'hashed'
                            ->dehydrated(fn (?string $state): bool => filled($state)) // Čuva lozinku samo ako je polje popunjeno
                            ->required(fn (string $operation): bool => $operation === 'create'), // Obavezno samo pri kreiranju
                    ])->columns(2), // Rasporedi polja u 2 kolone

                Section::make('Email Verification & Account Status')
                    ->description('Manage user verification status and account status (e.g., active, suspended).')
                    ->schema([
                        // Ručna verifikacija emaila u admin panelu
                        Forms\Components\Toggle::make('email_verified_at')
                            ->label('Email Verified')
                            ->helperText('Manually mark or unmark email as verified.')
                            ->visibleOn('edit') // Vidljivo samo pri izmeni korisnika
                            ->formatStateUsing(fn (?string $state) => filled($state)) // Konvertuje timestamp u boolean za prikaz
                            ->dehydrateStateUsing(fn (bool $state) => $state ? now() : null), // Čuva datum ili null

                        // Status korisnika
                        Select::make('status')
                            ->label('Account Status')
                            ->options([
                                'active' => 'Active',
                                'suspended' => 'Suspended',
                                'pending' => 'Pending',
                            ])
                            ->default('active') // Postavlja podrazumevanu vrednost pri kreiranju
                            ->required()
                            ->native(false) // Lepši prikaz za select polje
                            ->helperText('Set the account status (e.g., active, suspended).'),
                    ])->columns(1), // Možeš i 2 kolone ako ti je forma preduga

                Section::make('Contact Information')
                    ->description('Additional contact details for the user.')
                    ->schema([
                        TextInput::make('phone')
                            ->label('Phone Number')
                            ->tel() // Postavlja input tip na 'tel' za mobilne telefone
                            ->maxLength(255),
                        TextInput::make('address_line_1')
                            ->label('Address Line 1')
                            ->maxLength(255),
                        TextInput::make('address_line_2')
                            ->label('Address Line 2 (Optional)')
                            ->maxLength(255),
                        TextInput::make('city')
                            ->label('City')
                            ->maxLength(255),
                        TextInput::make('state')
                            ->label('State/Region')
                            ->maxLength(255),
                        TextInput::make('zip_code')
                            ->label('ZIP Code')
                            ->maxLength(255),
                        TextInput::make('country')
                            ->label('Country')
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Personal Details')
                    ->description('Other personal information.')
                    ->schema([
                        DatePicker::make('date_of_birth')
                            ->label('Date of Birth')
                            ->maxDate(now()) // Ne dozvoljava datume u budućnosti
                            ->native(false), // Lepši prikaz
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                // Prikaz statusa verifikacije emaila
                IconColumn::make('email_verified_at')
                    ->label('Verified')
                    ->boolean() // Prikazuje zelenu kvačicu za true, crveni X za false
                    ->getStateUsing(fn ($record) => filled($record->email_verified_at)), // TRUE ako je email_verified_at popunjeno

                // Prikaz statusa korisnika kao bedž (ispravna Filament 3.4+ sintaksa)
                TextColumn::make('status')
                    ->label('Status') // Labela kolone
                    ->badge() // Renderuj kao bedž
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Active',
                        'suspended' => 'Suspended',
                        'pending' => 'Pending',
                        default => ucfirst($state), // Za buduće statuse prikaži ih formatirano
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',    // Zelena za aktivne
                        'suspended' => 'danger',  // Crvena za suspendovane
                        'pending' => 'warning',   // Žuta/narandžasta za pending
                        default => 'secondary',   // Sivi/neutralni za ostalo
                    })
                    ->sortable(), // Omogući sortiranje po ovoj koloni

                TextColumn::make('phone')
                    ->label('Phone')
                    ->toggleable(isToggledHiddenByDefault: true), // Sakriveno po defaultu
                TextColumn::make('city')
                    ->label('City')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('country')
                    ->label('Country')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Registered At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filter za verifikovane korisnike
                Tables\Filters\Filter::make('verified')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('email_verified_at'))
                    ->toggle()
                    ->label('Verified Users'),
                // Filter za neverifikovane korisnike
                Tables\Filters\Filter::make('unverified')
                    ->query(fn (Builder $query): Builder => $query->whereNull('email_verified_at'))
                    ->toggle()
                    ->label('Unverified Users'),
                // Filter za status korisnika (dropdown)
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active' => 'Active',
                        'suspended' => 'Suspended',
                        'pending' => 'Pending',
                    ])
                    ->label('Filter by Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Ovde možeš dodati relation managers ako ti zatrebaju (npr. za porudžbine korisnika)
            // Trenutno su relacije u User modelu zakomentarisane, pa nema potrebe ovde dodavati.
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email', 'phone', 'city', 'country'];
    }

    // Opciono: Kontrola pristupa resursu (npr. samo admin može da ga vidi)
    // Bez Spatie permisija, ovo je jednostavna provera.
    public static function canViewAny(): bool
    {
        // Za tvoj setup, gde administrator ima svoj dashboard u Filamentu,
        // ovo može biti jednostavno 'true' ako je svaki autentifikovani Filament korisnik admin.
        // U realnom scenariju, ovde bi se dodala logika za proveru da li je korisnik zaista administrator,
        // npr. if (auth()->user()?->email === 'admin@yourdomain.com') return true;
        return true; // Trenutno dozvoljava pristup svima koji mogu da se prijave u Filament
    }
}