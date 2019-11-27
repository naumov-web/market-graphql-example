<?php

declare(strict_types=1);

namespace App\GraphQL\Types\Resources\Account;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class AbstractListType
 * @package App\GraphQL\Types\Resources\Account
 */
class AbstractListType extends GraphQLType
{
    /**
     * List of attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'AbstractList',
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
            'count' => [
                'type' => Type::int(),
                'description' => 'Count of list items'
            ],
        ];
    }
}
