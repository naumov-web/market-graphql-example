<?php

namespace App\GraphQL\Queries;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Query;

/**
 * Class AdminQuery
 * @package App\GraphQL\Queries
 */
abstract class AdminQuery extends Query
{
    /**
     * @param mixed $root
     * @param array $args
     * @param mixed $ctx
     * @param ResolveInfo|null $resolveInfo
     * @param Closure|null $getSelectFields
     * @return bool
     */
    public function authorize($root, array $args, $ctx, ResolveInfo $resolveInfo = null, Closure $getSelectFields = null): bool
    {
        return (bool)(auth()->user());
    }
}
