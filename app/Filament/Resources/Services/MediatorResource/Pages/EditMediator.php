<?php

namespace App\Filament\Resources\Services\MediatorResource\Pages;

use App\Filament\Resources\Services\MediatorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMediator extends EditRecord
{
    protected static string $resource = MediatorResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function beforeSave()
    {
        if(isset($this->data['Languages']))
        {

            foreach($this->data['Languages'] as $language)
            {
                $this->record->updateLanguage($language['language_id'], [
                    'title' => $language['title'],
                    'description' => $language['description']
                ]);
            }

        }
    }

    protected function afterSave()
    {
        $this->redirect($this->getResource()::getUrl('edit', ['record' => $this->record->getKey()]));
    }
}
