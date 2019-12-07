<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations\Account\Categories;

use App\Services\CategoriesService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Http\Response;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\SelectFields;

/**
 * Class UpdateCategoryMutation
 * @package App\GraphQL\Mutations\Account\Categories
 */
class UpdateCategoryMutation extends Mutation
{

    /**
     * Mutation attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'updateCategory',
        'description' => 'A mutation'
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
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::int())],
            'name' => ['name' => 'name', 'type' => Type::nonNull(Type::string())],
            'parent_id' => ['name' => 'parent_id', 'type' => Type::int()]
        ];
    }

    /**
     * Resolve mutation
     *
     * @param $root
     * @param $args
     * @param $context
     * @param ResolveInfo $resolveInfo
     * @param Closure $getSelectFields
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $select = $fields->getSelect();
        $with = $fields->getRelations();

        $model = $this->categories_service->getModelById($args['id']);

        if (!$model) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return $this->categories_service->update(
            $model,
            $args
        );
    }
}
