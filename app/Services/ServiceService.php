<?php

namespace App\Services;

use App\Repositories\ServiceRepository;
use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ServiceService
 * @package App\Services
 */
class ServiceService
{
    protected $serviceRepository;

    /**
     * ServiceService constructor.
     *
     * @param ServiceRepository $serviceRepository
     */
    public function __construct(ServiceRepository $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    /**
     * Get all services.
     *
     * @return Collection
     */
    public function getAllServices(): Collection
    {
        return $this->serviceRepository->getAll();
    }

    /**
     * Get services by type.
     *
     * @param string $type
     * @return Collection
     */
    public function getServicesByType(string $type): Collection
    {
        return $this->serviceRepository->getByType($type);
    }

    /**
     * Get a service by its ID.
     *
     * @param int $id
     * @return Service|null
     */
    public function getServiceById(int $id): ?Service
    {
        return $this->serviceRepository->findById($id);
    }

    /**
     * Create a new service.
     *
     * @param array $data
     * @return Service
     */
    public function createService(array $data): Service
    {
        return $this->serviceRepository->create($data);
    }

    /**
     * Update an existing service.
     *
     * @param int $id
     * @param array $data
     * @return Service
     */
    public function updateService(int $id, array $data): Service
    {
        return $this->serviceRepository->update($id, $data);
    }

    /**
     * Delete a service by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteService(int $id): bool
    {
        return $this->serviceRepository->delete($id);
    }
}
