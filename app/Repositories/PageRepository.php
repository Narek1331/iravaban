<?php

namespace App\Repositories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PageRepository
 * @package App\Repositories
 */
class PageRepository
{
    /**
     * Get all pages.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Page::all();
    }

    /**
     * Get pages by type.
     *
     * @param string $type
     * @return Collection
     */
    public function getByType(string $type): Collection
    {
        return Page::with(['languages'])
        ->where('type', $type)
        ->get();
    }

    /**
     * Get distinct page types.
     *
     * @return array
     */
    public function getTypes(): array
    {
        return Page::distinct('type')->pluck('type')->toArray();
    }
}
