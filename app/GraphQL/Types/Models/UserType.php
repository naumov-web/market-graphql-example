<?php

declare(strict_types=1);

namespace App\GraphQL\Types\Models;

use App\Models\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class UserType
 * @package App\GraphQL\Types\Models
 */
class UserType extends GraphQLType
{
    /**
     * Attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'User',
        'description' => 'A user',
        'model' => User::class,
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
                'description' => 'The id of user'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of user'
            ],
            'password' => [
                'type' => Type::string(),
                'description' => 'The password of user'
            ],
        ];
    }
}
