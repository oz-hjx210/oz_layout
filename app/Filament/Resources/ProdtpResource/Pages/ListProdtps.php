<?php

namespace App\Filament\Resources\ProdtpResource\Pages;

use App\Filament\Resources\ProdtpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdtps extends ListRecords
{
    protected static string $resource = ProdtpResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
