<?php

namespace App\Filament\Resources\ProdResource\Pages;

use App\Filament\Resources\ProdResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProd extends ListRecords
{
    protected static string $resource = ProdResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
