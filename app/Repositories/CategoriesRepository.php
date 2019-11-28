<?php

namespace App\Repositories;

use App\Models\Category;

/**
 * Class CategoriesRepository
 * @package App\Repositories
 */
class CategoriesRepository extends AbstractRepository
{

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Category::class;
    }
}
