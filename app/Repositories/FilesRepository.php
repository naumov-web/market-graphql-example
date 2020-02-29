<?php

namespace App\Repositories;

use App\Models\File;

/**
 * Class FilesRepository
 * @package App\Repositories
 */
class FilesRepository extends AbstractRepository
{

    /**
     * Get model class
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return File::class;
    }
}
