<?php

namespace App\Filament\Resources\Services\MediatorResource\Pages;

use App\Filament\Resources\Services\MediatorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMediators extends ListRecords
{
    protected static string $resource = MediatorResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
