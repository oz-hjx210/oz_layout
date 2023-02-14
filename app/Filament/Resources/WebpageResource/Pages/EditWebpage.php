<?php

namespace App\Filament\Resources\WebpageResource\Pages;

use App\Filament\Resources\WebpageResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWebpage extends EditRecord
{
    protected static string $resource = WebpageResource::class;

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
