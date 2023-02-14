<?php

namespace App\Filament\Resources\ProdtpResource\Pages;

use App\Filament\Resources\ProdtpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProdtp extends EditRecord
{
    protected static string $resource = ProdtpResource::class;

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
