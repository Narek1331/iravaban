<?php

namespace App\Filament\Resources\Services\LegalServiceResource\Pages;

use App\Filament\Resources\Services\LegalServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLegalServices extends ListRecords
{
    protected static string $resource = LegalServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
