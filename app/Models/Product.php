<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

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

    /**
     * Files relation
     *
     * @return MorphMany
     */
    public function files(): MorphMany
    {
        return $this->morphMany(File::class, 'owner');
    }

    /**
     * Categories relation
     * 
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'product_categories',
            'product_id',
            'category_id'
        );
    }
}
