<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\Account\Category;

use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

/**
 * Class CreateCategoryMutation
 * @package App\GraphQL\Mutations\Account\Category
 */
class CreateCategoryMutation extends Mutation
{
    /**
     * Mutation attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'createCategory',
        'description' => 'A mutation'
    ];

    /**
     * Get type of mutation
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('category');
    }

    /**
     * Get arguments list
     *
     * @return array
     */
    public function args(): array
    {
        return [
            'name' => ['name' => 'name', 'type' => Type::nonNull(Type::string())]
        ];
    }

    /**
     * Get validation rules
     *
     * @param array $args
     * @return array
     */
    protected function rules(array $args = []): array
    {
        return [
            'name' => ['required'],
        ];
    }

    /**
     * Resolve request
     *
     * @param $root
     * @param $args
     * @param $context
     * @param ResolveInfo $resolveInfo
     * @param Closure $getSelectFields
     * @return array
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return [
            'name' => 'Test-test-test'
        ];
    }
}
