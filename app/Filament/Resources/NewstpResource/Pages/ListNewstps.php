<?php

namespace App\Filament\Resources\NewstpResource\Pages;

use App\Filament\Resources\NewstpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewstps extends ListRecords
{
    protected static string $resource = NewstpResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
