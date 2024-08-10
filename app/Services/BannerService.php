<?php

namespace App\Services;

use App\Repositories\BannerRepository;
use App\Models\BannerImage;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BannerService
 * @package App\Services
 */
class BannerService
{
    protected $bannerRepository;

    /**
     * BannerService constructor.
     *
     * @param BannerRepository $bannerRepository
     */
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository = $bannerRepository;
    }

    /**
     * Get all banner images.
     *
     * @return Collection
     */
    public function getAllBanners(): Collection
    {
        return $this->bannerRepository->getAll();
    }

    /**
     * Find a banner image by its ID.
     *
     * @param int $id
     * @return BannerImage|null
     */
    public function getBannerById(int $id): ?BannerImage
    {
        return $this->bannerRepository->findById($id);
    }

    /**
     * Create a new banner image.
     *
     * @param array $data
     * @return BannerImage
     */
    public function createBanner(array $data): BannerImage
    {
        return $this->bannerRepository->create($data);
    }

    /**
     * Update an existing banner image.
     *
     * @param int $id
     * @param array $data
     * @return BannerImage
     */
    public function updateBanner(int $id, array $data): BannerImage
    {
        return $this->bannerRepository->update($id, $data);
    }

    /**
     * Delete a banner image by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteBanner(int $id): bool
    {
        return $this->bannerRepository->delete($id);
    }
}
