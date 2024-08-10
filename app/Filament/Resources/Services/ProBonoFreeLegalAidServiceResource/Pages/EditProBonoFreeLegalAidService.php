<?php

namespace App\Filament\Resources\Services\ProBonoFreeLegalAidServiceResource\Pages;

use App\Filament\Resources\Services\ProBonoFreeLegalAidServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProBonoFreeLegalAidService extends EditRecord
{
    protected static string $resource = ProBonoFreeLegalAidServiceResource::class;

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
