<?php

namespace App\Services;

use App\Repositories\AbstractRepository;
use App\Repositories\CategoriesRepository;

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
}
