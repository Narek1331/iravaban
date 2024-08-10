<?php

namespace App\Repositories;

use App\Models\BannerImage;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BannerRepository
 * @package App\Repositories
 */
class BannerRepository
{
    /**
     * Get all banner images.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return BannerImage::orderBy('order_by','asc')->get();
    }

    /**
     * Find a banner image by its ID.
     *
     * @param int $id
     * @return BannerImage|null
     */
    public function findById(int $id): ?BannerImage
    {
        return BannerImage::find($id);
    }

    /**
     * Create a new banner image.
     *
     * @param array $data
     * @return BannerImage
     */
    public function create(array $data): BannerImage
    {
        return BannerImage::create($data);
    }

    /**
     * Update an existing banner image.
     *
     * @param int $id
     * @param array $data
     * @return BannerImage
     */
    public function update(int $id, array $data): BannerImage
    {
        $bannerImage = $this->findById($id);
        if ($bannerImage) {
            $bannerImage->update($data);
        }
        return $bannerImage;
    }

    /**
     * Delete a banner image by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $bannerImage = $this->findById($id);
        return $bannerImage ? $bannerImage->delete() : false;
    }
}
