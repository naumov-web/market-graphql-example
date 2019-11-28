<?php

declare(strict_types=1);

namespace App\GraphQL\Queries\Account;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class AbstractListQuery
 * @package App\GraphQL\Queries
 */
abstract class AbstractListQuery extends Query
{

    /**
     * Get arguments list
     *
     * @return array
     */
    public function args(): array
    {
        return [
            'limit' => ['name' => 'limit', 'type' => Type::int()],
            'offset' => ['name' => 'offset', 'type' => Type::int()],
        ];
    }
}
