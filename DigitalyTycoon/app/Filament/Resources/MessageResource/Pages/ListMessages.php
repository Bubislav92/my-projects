<?php

namespace App\Filament\Resources\MessageResource\Pages;

use App\Filament\Resources\MessageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Forms;
use Illuminate\Support\Facades\Mail;
use Filament\Notifications\Notification;
use App\Mail\CustomMessageMail;

class ListMessages extends ListRecords
{
    protected static string $resource = MessageResource::class;

    // 🔹 Dugme "Send Message" u headeru (pored "Create")
    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('sendMessage')
                ->label('Send Message')
                ->icon('heroicon-o-paper-airplane')
                ->button()
                ->form([
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->required(),
                    Forms\Components\TextInput::make('subject')
                        ->required(),
                    Forms\Components\Textarea::make('body')
                        ->required(),
                ])
                ->action(function (array $data): void {
                    // pošalji mejl
                    Mail::to($data['email'])
                        ->send(new CustomMessageMail($data['subject'], $data['body']));
                    

                    // snimi u bazu ako želiš da ostane istorija
                    $this->getResource()::getModel()::create($data);

                    // notifikacija u panelu
                    Notification::make()
                        ->title('Message sent successfully!')
                        ->success()
                        ->send();
                }),
        ];
    }
}
