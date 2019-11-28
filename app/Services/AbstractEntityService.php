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
    public function store(array $data) : Model
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
    public function getById(int $id) : ?Model
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
    public function update(Model $model, array $data) : ?Model
    {
        return $this->getRepository()->update($model, $data);
    }

    /**
     * Get items and count
     *
     * @param array $data
     * @return array
     */
    public function index(array $data) : array
    {
        return $this->getRepository()->index($data);
    }

}
