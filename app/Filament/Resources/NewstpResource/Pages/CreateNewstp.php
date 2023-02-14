<?php

namespace App\Filament\Resources\NewstpResource\Pages;

use App\Filament\Resources\NewstpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateNewstp extends CreateRecord
{
    protected static string $resource = NewstpResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

}
