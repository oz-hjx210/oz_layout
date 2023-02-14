<?php

namespace App\Filament\Resources\SyssetResource\Pages;

use App\Filament\Resources\SyssetResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSyssets extends ListRecords
{
    protected static string $resource = SyssetResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
