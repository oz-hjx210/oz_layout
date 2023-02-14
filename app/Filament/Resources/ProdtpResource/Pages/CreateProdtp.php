<?php

namespace App\Filament\Resources\ProdtpResource\Pages;

use App\Filament\Resources\ProdtpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProdtp extends CreateRecord
{
    protected static string $resource = ProdtpResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
