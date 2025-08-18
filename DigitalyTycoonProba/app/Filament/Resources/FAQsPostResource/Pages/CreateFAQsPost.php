<?php

namespace App\Filament\Resources\FAQsPostResource\Pages;

use App\Filament\Resources\FAQsPostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFAQsPost extends CreateRecord
{

    use CreateRecord\Concerns\Translatable;

    protected static string $resource = FAQsPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
