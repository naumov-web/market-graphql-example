<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 * @package App\Models
 *
 * @property-read int $id
 * @property string $name
 * @property string $path
 * @property string $mime
 * @property bool $is_main
 * @property int $owner_id
 * @property string $owner_type
 */
class File extends Model
{
    /**
     * Guarded fields list
     * @var array
     */
    protected $guarded = [];
}
