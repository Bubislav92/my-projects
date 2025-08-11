<?php

namespace App\Filament\Resources\PayPalSettingResource\Pages;

use App\Filament\Resources\PayPalSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPayPalSettings extends ListRecords
{
    protected static string $resource = PayPalSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
