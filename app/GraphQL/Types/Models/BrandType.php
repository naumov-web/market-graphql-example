<?php

namespace App\GraphQL\Types\Models;

use App\Models\Brand;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class BrandType
 * @package App\GraphQL\Types\Models
 */
class BrandType extends GraphQLType
{
    /**
     * Attributes of type
     * @var array
     */
    protected $attributes = [
        'name' => 'Brands',
        'description' => 'A type',
        'model' => Brand::class,
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
                'description' => 'The id of brand'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of brand'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The name of brand'
            ]
        ];
    }
}
