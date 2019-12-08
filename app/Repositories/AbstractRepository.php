<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Class AbstractRepository
 * @package App\Repositories
 */
abstract class AbstractRepository
{

    /**
     * Get model class name
     *
     * @return string
     */
    protected abstract function getModelClass() : string;

    /**
     * Get model by id
     *
     * @param int $id
     * @return Model|null
     */
    public function getById(int $id): ?Model
    {
        $model_class = $this->getModelClass();

        return $model_class::find($id);
    }

    /**
     * Update model
     *
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function update(Model $model, array $data): Model
    {
        $model->fill($data);
        $model->save();

        return $model;
    }

    /**
     * Delete model
     *
     * @param Model $model
     * @return bool
     * @throws \Exception
     */
    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    /**
     * Get items and count
     *
     * @param array $data
     * @return array
     */
    public function index(array $data) : array
    {
        $model_class = $this->getModelClass();

        /**
         * @var Builder $query
         */
        $query = $model_class::query();
        $count = $query->count();

        if (isset($data['limit'])) {
            $query->limit($data['limit']);
        }
        if (isset($data['offset'])) {
            $query->offset($data['offset']);
        }

        if (isset($data['sort_by']) && isset($data['sort_direction'])) {
            $query->orderBy($data['sort_by'], $data['sort_direction']);
        }

        return [
            'count' => $count,
            'items' => $query->get(),
        ];
    }

    /**
     * Store new model to database
     *
     * @param array $data
     * @return Model
     */
    public function store(array $data) : Model
    {
        $model_class = $this->getModelClass();

        /**
         * @var Model $model
         */
        $model = new $model_class();
        $model->fill($data);
        $model->save();

        return $model;
    }

}
