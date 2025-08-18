<?php

namespace App\Filament\Resources\HomePostResource\Pages;

use App\Filament\Resources\HomePostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHomePosts extends ListRecords
{

    use ListRecords\Concerns\Translatable;

    protected static string $resource = HomePostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
