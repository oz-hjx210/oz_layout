<?php

namespace App\Filament\Resources\ModuletpResource\Pages;

use App\Filament\Resources\ModuletpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditModuletp extends EditRecord
{
    protected static string $resource = ModuletpResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
