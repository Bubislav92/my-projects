<?php

namespace App\Filament\Resources\HomePostResource\Pages;

use App\Filament\Resources\HomePostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateHomePost extends CreateRecord
{

    use CreateRecord\Concerns\Translatable;

    protected static string $resource = HomePostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
