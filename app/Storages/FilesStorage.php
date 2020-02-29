<?php

namespace App\Storages;

/**
 * Class FilesStorage
 * @package App\Storages
 */
class FilesStorage extends AbstractStorage
{

    /**
     * Path to uploaded files
     * @var string
     */
    const UPLOADS_DIR = '/app/public/uploads/';

    /**
     * Store a file
     *
     * @param array $data
     * @return string
     */
    public function store(array $data): string
    {
        $directory_path = self::UPLOADS_DIR . sha1(microtime()) . '/' . sha1($data['content']);
        $file_path = $directory_path . '/' . $data['name'];

        if (!file_exists(storage_path($directory_path))) {
            mkdir(
                storage_path($directory_path),
                0777,
                $recursive = true
            );
        }

        file_put_contents(storage_path($file_path), base64_decode($data['content']));

        return $file_path;
    }

}
