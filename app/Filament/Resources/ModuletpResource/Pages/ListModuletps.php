<?php

namespace App\Filament\Resources\ModuletpResource\Pages;

use App\Filament\Resources\ModuletpResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListModuletps extends ListRecords
{
    protected static string $resource = ModuletpResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
