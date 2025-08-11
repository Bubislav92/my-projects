<?php

namespace App\Filament\Resources\PayPalSettingResource\Pages;

use App\Filament\Resources\PayPalSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPayPalSetting extends EditRecord
{
    protected static string $resource = PayPalSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
