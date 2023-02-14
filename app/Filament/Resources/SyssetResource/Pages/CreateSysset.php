<?php

namespace App\Filament\Resources\SyssetResource\Pages;

use App\Filament\Resources\SyssetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSysset extends CreateRecord
{
    protected static string $resource = SyssetResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
