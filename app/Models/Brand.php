<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Brand
 * @package App\Models
 *
 * @property-read int $id
 * @property string $name
 * @property string|null $description
 */
class Brand extends Model
{
    /**
     * Guarded fields list
     * @var array
     */
    protected $guarded = [];
}
