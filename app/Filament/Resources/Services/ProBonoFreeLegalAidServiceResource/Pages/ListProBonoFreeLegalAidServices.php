<?php

namespace App\Filament\Resources\Services\ProBonoFreeLegalAidServiceResource\Pages;

use App\Filament\Resources\Services\ProBonoFreeLegalAidServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProBonoFreeLegalAidServices extends ListRecords
{
    protected static string $resource = ProBonoFreeLegalAidServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
