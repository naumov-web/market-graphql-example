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
     * Files service instance
     * @var FilesService
     */
    protected $files_service;

    /**
     * BrandsService constructor.
     * @param BrandsRepository $repository
     * @param FilesService $files_service
     */
    public function __construct(
        BrandsRepository $repository,
        FilesService $files_service
    )
    {
        $this->repository = $repository;
        $this->files_service = $files_service;
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
        $model = $this->storeModel(
            Arr::only(
                $data,
                [
                    'name',
                    'description'
                ]
            )
        );

        $this->files_service->store($model, $data['file']);

        return $model;
    }

    /**
     * Update brand
     *
     * @param Model $model
     * @param array $data
     * @return Model|null
     * @throws \Exception
     */
    public function update(Model $model, array $data): ?Model
    {
        $model = $this->updateModel(
            $model,
            Arr::only(
                $data,
                [
                    'name',
                    'description'
                ]
            )
        );

        if (isset($data['file'])) {
            $file = $model->file;

            if ($file) {
                $this->files_service->delete($file);
            }

            $this->files_service->store($model, $data['file']);
        }

        return $model;
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
        $file = $model->file;

        if ($file) {
            $this->files_service->delete($file);
        }

        return $this->deleteModel($model);
    }
}
