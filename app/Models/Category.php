<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 *
 * @property-read int $id
 * @property int|null $parent_id
 * @property string $name
 */
class Category extends Model
{

    /**
     * Guarded fields list
     * @var array
     */
    protected $guarded = [];
}
