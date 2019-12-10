<?php

declare(strict_types=1);

namespace App\GraphQL\Queries\Account;

use App\GraphQL\Queries\AdminQuery;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

/**
 * Class AbstractListQuery
 * @package App\GraphQL\Queries
 */
abstract class AbstractListQuery extends AdminQuery
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
            'sort_by' => ['name' => 'sort_by', 'type' => Type::string()],
            'sort_direction' => ['name' => 'sort_direction', 'type' => Type::string()]
        ];
    }
}
