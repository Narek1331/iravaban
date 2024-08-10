<?php

namespace App\Traits;

use Illuminate\Support\Str;
use App\Models\Language;
trait LanguageRelations
{
    public function languages()
    {
        return $this->morphToMany(Language::class, 'languageable')
        ->withPivot('title', 'description');

    }

     /**
     * Update language details.
     *
     * @param  int  $languageId
     * @param  array  $data
     * @return void
     */
    public function updateLanguage($languageId, array $data)
    {
        $this->languages()->updateExistingPivot($languageId, $data);
    }

}
