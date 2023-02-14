<?php

namespace App\Filament\Resources\DemoResource\Pages;

use App\Filament\Resources\DemoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDemos extends ListRecords
{
    protected static string $resource = DemoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
