<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    public function getTitle(): string
    {
        $record = $this->getRecord();
        return $record ? $record->type : 'Edit Page';
    }


    protected function beforeSave()
    {
        if(isset($this->data['languages']))
        {

            foreach($this->data['languages'] as $language)
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
