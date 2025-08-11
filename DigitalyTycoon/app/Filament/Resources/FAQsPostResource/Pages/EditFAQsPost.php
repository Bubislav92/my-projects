<?php

namespace App\Filament\Resources\FAQsPostResource\Pages;

use App\Filament\Resources\FAQsPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFAQsPost extends EditRecord
{

    use EditRecord\Concerns\Translatable;

    protected static string $resource = FAQsPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
