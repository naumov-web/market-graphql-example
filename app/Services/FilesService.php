<?php

namespace App\Services;

use App\Repositories\AbstractRepository;
use App\Repositories\FilesRepository;

/**
 * Class FilesService
 * @package App\Services
 */
class FilesService extends AbstractEntityService
{

    /**
     * Files repository
     * @var FilesRepository
     */
    protected $repository;

    /**
     * FilesService constructor.
     * @param FilesRepository $repository
     */
    public function __construct(FilesRepository $repository)
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
