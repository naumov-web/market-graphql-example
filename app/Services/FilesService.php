<?php

namespace App\Services;

use App\Repositories\AbstractRepository;
use App\Repositories\FilesRepository;
use App\Storages\FilesStorage;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FilesService
 * @package App\Services
 */
class FilesService extends AbstractEntityService
{

    /**
     * Files repository instance
     * @var FilesRepository
     */
    protected $repository;

    /**
     * Files storage instance
     * @var FilesStorage
     */
    protected $files_storage;

    /**
     * FilesService constructor.
     * @param FilesRepository $repository
     * @param FilesStorage $files_storage
     */
    public function __construct(FilesRepository $repository, FilesStorage $files_storage)
    {
        $this->repository = $repository;
        $this->files_storage = $files_storage;
    }

    /**
     * @inheritDoc
     */
    protected function getRepository(): AbstractRepository
    {
        return $this->repository;
    }

    /**
     * Store a file and create record into database
     *
     * @param Model $owner
     * @param array $data
     * @return Model
     */
    public function store(Model $owner, array $data): Model
    {
        $model_data = [
            'name' => $data['name'],
            'mime' => $data['mime'],
            'owner_id' => $owner->id,
            'owner_type' => get_class($owner),
            'is_main' => isset($data['is_main']) ? $data['is_main'] : false,
            'path' => $this->files_storage->store($data)
        ];

        return $this->storeModel($model_data);
    }
}
