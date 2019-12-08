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
}
