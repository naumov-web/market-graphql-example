<?php

namespace App\GraphQL\Types\Models\Creation;

use App\Models\Brand;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class CreateBrandType
 * @package App\GraphQL\Types\Models\Creation
 */
class CreateBrandType extends GraphQLType
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
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of brand'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of brand'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of brand'
            ],
            'file' => [
                'type' => GraphQL::type('createFile'),
                'description' => 'Logo of brand'
            ]
        ];
    }
}
