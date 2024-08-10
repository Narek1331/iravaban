<?php

namespace App\Filament\Resources\Services\ProBonoFreeLegalAidServiceResource\Pages;

use App\Filament\Resources\Services\ProBonoFreeLegalAidServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Service;

class CreateProBonoFreeLegalAidService extends CreateRecord
{
    protected static string $resource = ProBonoFreeLegalAidServiceResource::class;

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
