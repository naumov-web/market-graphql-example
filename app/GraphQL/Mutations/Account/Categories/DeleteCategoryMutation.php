<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\Account\Categories;

use App\GraphQL\Mutations\AdminMutation;
use App\Services\CategoriesService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Http\Response;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class DeleteCategoryMutation
 * @package App\GraphQL\Mutations\Account\Categories
 */
class DeleteCategoryMutation extends AdminMutation
{
    /**
     * Mutation attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'deleteCategory',
        'description' => 'Mutation for deleting of category'
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
        return GraphQL::type('defaultBoolean');
    }

    /**
     * Get arguments list
     *
     * @return array
     */
    public function args(): array
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::int())],
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
     * @throws \Exception
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $model = $this->categories_service->getModelById($args['id']);

        if (!$model) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return [
            'success' => $this->categories_service->delete($model)
        ];
    }
}
