<?php

declare(strict_types=1);

namespace App\GraphQL\Types\Models;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class CategoryType
 * @package App\GraphQL\Types\Models
 */

class CategoryType extends GraphQLType
{
    /**
     * Attributes of type
     * @var array
     */
    protected $attributes = [
        'name' => 'Category',
        'description' => 'A type',
        'model' => Category::class,
    ];

    /**
     * Get fields list
     * @return array
     */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of category'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of category'
            ],
            'parent_id' => [
                'type' => Type::int(),
                'description' => 'Id of parent category'
            ]
        ];
    }
}
