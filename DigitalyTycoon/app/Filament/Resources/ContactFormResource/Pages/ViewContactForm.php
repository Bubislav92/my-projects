<?php

namespace App\Filament\Resources\ContactFormResource\Pages;

use App\Filament\Resources\ContactFormResource;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyToContact;

class ViewContactForm extends ViewRecord
{
    protected static string $resource = ContactFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
            Actions\DeleteAction::make(),
            Actions\Action::make('reply')
                ->label('Odgovori')
                ->icon('heroicon-o-paper-airplane')
                ->color('info')
                ->form([
                    Textarea::make('message')
                        ->label('Vaš odgovor')
                        ->required()
                        ->rows(10),
                ])
                ->action(function (array $data, $record) {
                    Mail::to($record->email)->send(new ReplyToContact($data['message']));

                    Notification::make()
                        ->title('Odgovor je uspešno poslat!')
                        ->success()
                        ->send();

                    // Опционо, можете преусмерити корисника на листу порука
                    // return redirect()->route('filament.admin.resources.contact-forms.index');
                })
        ];
    }
}