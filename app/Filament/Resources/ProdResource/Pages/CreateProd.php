<?php

namespace App\Filament\Resources\ProdResource\Pages;

use App\Filament\Resources\ProdResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProd extends CreateRecord
{
    protected static string $resource = ProdResource::class;


    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
