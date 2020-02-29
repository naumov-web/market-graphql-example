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
     * Url prefix
     * @var string
     */
    const URL_PREFIX = '/storage/uploads/';

    /**
     * Store a file
     *
     * @param array $data
     * @return string
     */
    public function store(array $data): string
    {
        $directories = sha1(microtime()) . '/' . sha1($data['content']);
        $directory_path = self::UPLOADS_DIR . $directories;
        $file_path = $directory_path . '/' . $data['name'];

        if (!file_exists(storage_path($directory_path))) {
            mkdir(
                storage_path($directory_path),
                0777,
                $recursive = true
            );
        }

        file_put_contents(storage_path($file_path), base64_decode($data['content']));

        return self::URL_PREFIX . $directories . '/' . $data['name'];
    }

}
