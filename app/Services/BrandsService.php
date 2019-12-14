<?php

namespace App\Services;

use App\Repositories\AbstractRepository;
use App\Repositories\BrandsRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * Class BrandsService
 * @package App\Services
 */
class BrandsService extends AbstractEntityService
{

    /**
     * Brands repository instance
     * @var BrandsRepository
     */
    protected $repository;

    /**
     * BrandsService constructor.
     * @param BrandsRepository $repository
     */
    public function __construct(BrandsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritDoc
     */
    protected function getRepository(): AbstractRepository
    {
        return $this->repository;
    }

    /**
     * Store new brand
     *
     * @param array $data
     * @return Model
     */
    public function store(array $data): Model
    {
        return $this->storeModel(
            Arr::only(
                $data,
                [
                    'name',
                    'description'
                ]
            )
        );
    }

    /**
     * Update brand
     *
     * @param Model $model
     * @param array $data
     * @return Model|null
     */
    public function update(Model $model, array $data): ?Model
    {
        return $this->updateModel(
            $model,
            Arr::only(
                $data,
                [
                    'name',
                    'description'
                ]
            )
        );
    }

    /**
     * Delete brand
     *
     * @param Model $model
     * @return bool
     * @throws \Exception
     */
    public function delete(Model $model): bool
    {
        return $this->deleteModel($model);
    }
}
