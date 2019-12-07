<?php

namespace App\GraphQL\Types\Resources;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class DefaultBooleanType
 * @package App\GraphQL\Types\Resources
 */
class DefaultBooleanType extends GraphQLType
{
    /**
     * Attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'Default response',
        'description' => 'A user'
    ];

    /**
     * Get fields list
     * @return array
     */
    public function fields(): array
    {
        return [
            'success' => [
                'type' => Type::boolean(),
                'description' => 'Result of request'
            ],
        ];
    }
}
