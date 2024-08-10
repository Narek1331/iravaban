<?php

namespace App\Repositories;

use App\Models\Language;

class LanguageRepository
{
    /**
     * Get all languages.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function get()
    {
        return Language::all();
    }

    /**
     * Get a language by its ID.
     *
     * @param int $id
     * @return \App\Models\Language|null
     */
    public function getById(int $id)
    {
        return Language::find($id);
    }

    /**
     * Get a language by its slug.
     *
     * @param string $slug
     * @return \App\Models\Language|null
     */
    public function getBySlug(string $slug)
    {
        return Language::where('slug', $slug)->first();
    }
}
