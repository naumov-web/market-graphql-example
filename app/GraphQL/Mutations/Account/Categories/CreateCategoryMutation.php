<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\Account\Categories;

use App\GraphQL\Mutations\AdminMutation;
use App\Services\CategoriesService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Model;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class CreateCategoryMutation
 * @package App\GraphQL\Mutations\Account\Categories
 */
class CreateCategoryMutation extends AdminMutation
{
    /**
     * Mutation attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'createCategory',
        'description' => 'Mutation for creating of category'
    ];

    /**
     * Categories service instance
     * @var CategoriesService
     */
    protected $categories_service;

    /**
     * CreateCategoryMutation constructor.
     * @param CategoriesService $categories_service
     */
    public function __construct(CategoriesService $categories_service)
    {
        $this->categories_service = $categories_service;
    }

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
            'name' => ['name' => 'name', 'type' => Type::nonNull(Type::string())],
            'parent_id' => ['name' => 'parent_id', 'type' => Type::int()]
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
            'parent_id' => ['nullable', 'integer']
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
     * @return Model
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        return $this->categories_service->storeModel($args);
    }
}
