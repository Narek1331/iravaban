<?php

namespace App\Filament\Resources\Services\LegalServiceResource\Pages;

use App\Filament\Resources\Services\LegalServiceResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLegalService extends EditRecord
{
    protected static string $resource = LegalServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
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
