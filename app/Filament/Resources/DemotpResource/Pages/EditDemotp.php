<?php

namespace App\Filament\Resources\DemotpResource\Pages;

use App\Filament\Resources\DemotpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDemotp extends EditRecord
{
    protected static string $resource = DemotpResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
