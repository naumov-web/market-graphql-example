<?php

namespace App\Repositories;

use App\Models\Brand;

/**
 * Class BrandsRepository
 * @package App\Repositories
 */
class BrandsRepository extends AbstractRepository
{

    /**
     * @inheritDoc
     */
    protected function getModelClass(): string
    {
        return Brand::class;
    }
}
