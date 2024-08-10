<?php

namespace App\Filament\Resources\Services\MediatorResource\Pages;

use App\Filament\Resources\Services\MediatorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Service;
class CreateMediator extends CreateRecord
{
    protected static string $resource = MediatorResource::class;

    public function create(bool $another = false): void
    {
        $legalService = Service::create(['type' => 'mediator']);

        if (isset($this->data['Languages'])) {
            $languages = $this->data['Languages'];

            $syncData = [];
            foreach ($languages as $language) {
                $syncData[$language['id']] = [
                    'title' => $language['title'],
                    'description' => $language['description'],
                ];
            }

            $legalService->languages()->sync($syncData);
        }

        $this->redirect($this->getResource()::getUrl('edit', ['record' => $legalService->id]));
    }
}
