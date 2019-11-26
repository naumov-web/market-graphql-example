<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class UserLoginType
 * @package App\GraphQL\Types
 */
class UserLoginType extends GraphQLType
{
    /**
     * Attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'UserLogin',
        'description' => 'A type'
    ];

    /**
     * Get fields list
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            'token' => [
                'type' => Type::string(),
                'description' => 'The token of user'
            ],
        ];
    }
}
