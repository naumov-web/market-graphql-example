<?php

declare(strict_types=1);

namespace App\GraphQL\Types\Resources\Account\Categories;

use App\GraphQL\Types\Resources\Account\AbstractListType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class CategoriesList
 * @package App\GraphQL\Types\Resources\Account\Categories
 */
class CategoriesList extends AbstractListType
{
    /**
     * List of attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'CategoriesList',
        'description' => 'List of categories'
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
                    'type' => Type::nonNull(Type::listOf(GraphQL::type('category'))),
                    'description' => 'List of items'
                ]
            ]
        );
    }
}
