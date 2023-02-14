<?php

namespace App\Filament\Resources\ProdResource\Pages;

use App\Filament\Resources\ProdResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProd extends EditRecord
{
    protected static string $resource = ProdResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
