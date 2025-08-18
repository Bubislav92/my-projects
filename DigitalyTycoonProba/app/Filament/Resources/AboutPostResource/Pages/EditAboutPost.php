<?php

namespace App\Filament\Resources\AboutPostResource\Pages;

use App\Filament\Resources\AboutPostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAboutPost extends EditRecord
{

    use EditRecord\Concerns\Translatable;

    protected static string $resource = AboutPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
