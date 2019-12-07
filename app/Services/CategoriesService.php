<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\AbstractRepository;
use App\Repositories\CategoriesRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

/**
 * Class CategoriesService
 * @package App\Services
 */
class CategoriesService extends AbstractEntityService
{

    /**
     * Categories repository instance
     * @var CategoriesRepository
     */
    protected $repository;

    /**
     * UsersService constructor.
     * @param CategoriesRepository $repository
     */
    public function __construct(CategoriesRepository $repository)
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
     * Update category
     *
     * @param Model $model
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function update(Model $model, array $data): ?Model
    {
        return $this->updateModel(
            $model,
            Arr::only(
                $data,
                [
                    'name',
                    'parent_id'
                ]
            )
        );
    }
}
