<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 *
 * @property-read int $id
 * @property int $brand_id
 * @property string $name
 * @property string $description
 * @property bool $is_published
 */
class Product extends Model
{
    /**
     * Guarded fields list
     * @var array
     */
    protected $guarded = [];
}
