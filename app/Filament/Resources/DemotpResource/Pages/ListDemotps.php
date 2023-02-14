<?php

namespace App\Filament\Resources\DemotpResource\Pages;

use App\Filament\Resources\DemotpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDemotps extends ListRecords
{
    protected static string $resource = DemotpResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
