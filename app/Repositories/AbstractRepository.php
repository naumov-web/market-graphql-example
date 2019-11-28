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

    /**
     * Update model
     *
     * @param Model $model
     * @param array $data
     * @return Model
     */
    public function update(Model $model, array $data) : Model
    {
        $model->fill($data);
        $model->save();

        return $model;
    }

}
