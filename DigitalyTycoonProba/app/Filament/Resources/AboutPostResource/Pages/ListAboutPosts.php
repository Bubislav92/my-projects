<?php

namespace App\Filament\Resources\AboutPostResource\Pages;

use App\Filament\Resources\AboutPostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAboutPosts extends ListRecords
{

    use ListRecords\Concerns\Translatable;

    protected static string $resource = AboutPostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
