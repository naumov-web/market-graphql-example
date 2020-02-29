<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

/**
 * Class Brands
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

    /**
     * File relation
     *
     * @return MorphOne
     */
    public function file(): MorphOne
    {
        return $this->morphOne(File::class, 'owner');
    }
}
