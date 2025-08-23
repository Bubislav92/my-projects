<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactFormResource\Pages;
use App\Filament\Resources\ContactFormResource\RelationManagers;
use App\Models\ContactForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyToContact;

class ContactFormResource extends Resource
{
    protected static ?string $model = ContactForm::class;

    // Postavlja ikonicu za navigaciju
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    // Postavlja naziv resursa u navigaciji
    protected static ?string $navigationLabel = 'Poruke';

    // Postavlja grupu u navigaciji
    protected static ?string $navigationGroup = 'Komunikacija';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forma za prikaz pojedinačne poruke
                TextInput::make('full_name')->label('Ime i prezime')->readOnly(),
                TextInput::make('email')->label('E-pošta')->email()->readOnly(),
                TextInput::make('company_name')->label('Naziv firme')->readOnly(),
                TextInput::make('phone')->label('Telefon')->readOnly(),
                Select::make('project_type')
                    ->options([
                        'website' => 'Novi web sajt',
                        'ecommerce' => 'E-prodavnica',
                        'redesign' => 'Re-dizajn',
                        'maintenance' => 'Održavanje',
                        'custom_app' => 'Custom aplikacija',
                        'other' => 'Drugo',
                    ])
                    ->label('Tip projekta')
                    ->disabled(),
                Select::make('budget')
                    ->options([
                        '<5000' => 'Manje od 5.000 €',
                        '5000-10000' => '5.000 € - 10.000 €',
                        '10000-20000' => '10.000 € - 20.000 €',
                        '>20000' => 'Više od 20.000 €',
                        'unknown' => 'Nisam siguran/na',
                    ])
                    ->label('Budžet')
                    ->disabled(),
                Textarea::make('message')->label('Poruka')
                    ->rows(5)
                    ->readOnly(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Definiše kolone za prikaz u tabeli
                TextColumn::make('full_name')->label('Ime i prezime')->searchable()->sortable(),
                TextColumn::make('email')->label('E-pošta')->searchable(),
                TextColumn::make('project_type')->label('Tip projekta')->sortable(),
                TextColumn::make('message')->label('Poruka')->words(10),
                TextColumn::make('created_at')->label('Primljeno')->dateTime()->sortable(),
            ])
            ->filters([
                // Omogućava filtriranje
                SelectFilter::make('project_type')
                    ->label('Filtriraj po tipu projekta')
                    ->options([
                        'website' => 'Novi web sajt',
                        'ecommerce' => 'E-prodavnica',
                        'redesign' => 'Re-dizajn',
                        'maintenance' => 'Održavanje',
                        'custom_app' => 'Custom aplikacija',
                        'other' => 'Drugo',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),

                // Dodajemo novu akciju "Odgovori"
                Action::make('reply')
                    ->label('Odgovori')
                    ->icon('heroicon-o-arrow-path')
                    ->form([
                        Textarea::make('message')
                            ->label('Vaš odgovor')
                            ->required()
                            ->rows(10),
                    ])
                    ->action(function (array $data, $record) {
                        // Slanje mejla
                        Mail::to($record->email)->send(new ReplyToContact($data['message']));

                        // Prikazivanje notifikacije o uspešnom slanju
                        Notification::make()
                            ->title('Odgovor je uspešno poslat!')
                            ->success()
                            ->send();
                    })

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
            'index' => Pages\ListContactForms::route('/'),
            'view' => Pages\ViewContactForm::route('/{record}'),
            'edit' => Pages\EditContactForm::route('/{record}/edit'),
        ];
    }
}