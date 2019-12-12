<?php

declare(strict_types=1);

namespace App\GraphQL\Types\Resources\Account\Brands;

use App\GraphQL\Types\Resources\Account\AbstractListType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class BrandsList
 * @package App\GraphQL\Types\Resources\Account\Brands
 */
class BrandsList extends AbstractListType
{
    /**
     * List of attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'BrandsList',
        'description' => 'List of brands'
    ];

    /**
     * Get fields list
     *
     * @return array
     */
    public function fields(): array
    {
        return array_merge(
            parent::fields(),
            [
                'items' => [
                    'type' => Type::listOf(GraphQL::type('brand')),
                    'description' => 'List of items'
                ]
            ]
        );
    }
}
