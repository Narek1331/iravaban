<?php

namespace App\Services;

use App\Repositories\PageRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class PageService
 * @package App\Services
 */
class PageService
{
    protected $pageRepository;

    /**
     * PageService constructor.
     *
     * @param PageRepository $pageRepository
     */
    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Get all pages.
     *
     * @return Collection
     */
    public function getAllPages(): Collection
    {
        return $this->pageRepository->getAll();
    }

    /**
     * Get pages by type.
     *
     * @param string $type
     * @return Collection
     */
    public function getPagesByType(string $type): Collection
    {
        return $this->pageRepository->getByType($type);
    }

    /**
     * Get distinct page types.
     *
     * @return array
     */
    public function getPageTypes(): array
    {
        return $this->pageRepository->getTypes();
    }
}
