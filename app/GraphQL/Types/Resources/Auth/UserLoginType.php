<?php

declare(strict_types=1);

namespace App\GraphQL\Types\Resources\Auth;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class UserLoginType
 * @package App\GraphQL\Types\Resources\Auth
 */
class UserLoginType extends GraphQLType
{
    /**
     * List of attributes
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
                'type' => Type::nonNull(Type::string()),
                'description' => 'The token of user'
            ],
        ];
    }
}
