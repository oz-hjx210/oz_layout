<?php

namespace App\Filament\Resources\NewstpResource\Pages;

use App\Filament\Resources\NewstpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewstp extends EditRecord
{
    protected static string $resource = NewstpResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
