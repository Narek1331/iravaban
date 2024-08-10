<?php

namespace App\Services;

use App\Repositories\LanguageRepository;

class LanguageService
{
    /**
     * The Language repository instance.
     *
     * @var \App\Repositories\LanguageRepository
     */
    protected $repository;

    /**
     * Create a new service instance.
     *
     * @param \App\Repositories\LanguageRepository $repository
     */
    public function __construct(LanguageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all languages.
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function get()
    {
        return $this->repository->get();
    }

    /**
     * Get a language by its ID.
     *
     * @param int $id
     * @return \App\Models\Language|null
     */
    public function getById(int $id)
    {
        return $this->repository->getById($id);
    }

    /**
     * Get a language by its slug.
     *
     * @param string $slug
     * @return \App\Models\Language|null
     */
    public function getBySlug(string $slug)
    {
        return $this->repository->getBySlug($slug);
    }

     /**
     * Check if the given language is supported.
     *
     * @param string $language
     * @return bool
     */
    public function isSupportedLanguage(string $language): bool
    {
        $supportedLanguages = $this->get()->pluck('slug')->toArray();
        return in_array($language, $supportedLanguages);
    }
}
