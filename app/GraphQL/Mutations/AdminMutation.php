<?php

namespace App\GraphQL\Mutations;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Mutation;

/**
 * Class AdminMutation
 * @package App\GraphQL\Mutations
 */
abstract class AdminMutation extends Mutation
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
