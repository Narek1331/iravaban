<?php

namespace App\Repositories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ServiceRepository
 * @package App\Repositories
 */
class ServiceRepository
{
    /**
     * Get all services.
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Service::orderBy('order_by','asc')
        ->with(['languages'])
        ->get();
    }

    /**
     * Get services by type.
     *
     * @param string $type
     * @return Collection
     */
    public function getByType(string $type): Collection
    {
        return Service::orderBy('order_by','asc')
        ->where('type', $type)
        ->with(['languages'])
        ->get();
    }

    /**
     * Get a service by its ID.
     *
     * @param int $id
     * @return Service|null
     */
    public function findById(int $id): ?Service
    {
        return Service::find($id);
    }

    /**
     * Create a new service.
     *
     * @param array $data
     * @return Service
     */
    public function create(array $data): Service
    {
        return Service::create($data);
    }

    /**
     * Update an existing service.
     *
     * @param int $id
     * @param array $data
     * @return Service
     */
    public function update(int $id, array $data): Service
    {
        $service = $this->findById($id);
        if ($service) {
            $service->update($data);
        }
        return $service;
    }

    /**
     * Delete a service by its ID.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $service = $this->findById($id);
        return $service ? $service->delete() : false;
    }
}
