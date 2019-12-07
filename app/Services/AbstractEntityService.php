<?php

namespace App\Services;

use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractEntityService
 * @package App\Services
 */
abstract class AbstractEntityService
{

    /**
     * Get repository instance
     *
     * @return AbstractRepository
     */
    abstract protected function getRepository() : AbstractRepository;

    /**
     * Store new entity
     *
     * @param array $data
     * @return Model
     */
    public function storeModel(array $data) : Model
    {
        $repository = $this->getRepository();

        return $repository->store($data);
    }

    /**
     * Get model by id
     *
     * @param int $id
     * @return Model|null
     */
    public function getModelById(int $id) : ?Model
    {
        return $this->getRepository()->getById($id);
    }

    /**
     * Simple updating of model
     *
     * @param Model $model
     * @param array $data
     * @return Model|null
     */
    public function updateModel(Model $model, array $data) : ?Model
    {
        return $this->getRepository()->update($model, $data);
    }

    /**
     * Delete model
     *
     * @param Model $model
     * @return bool
     * @throws \Exception
     */
    public function deleteModel(Model $model): bool
    {
        return $this->getRepository()->delete($model);
    }

    /**
     * Get items and count
     *
     * @param array $data
     * @return array
     */
    public function indexModels(array $data) : array
    {
        return $this->getRepository()->index($data);
    }

}
