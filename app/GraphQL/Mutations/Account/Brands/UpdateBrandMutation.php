<?php

namespace App\GraphQL\Mutations\Account\Brands;

use App\GraphQL\Mutations\AdminMutation;
use App\Services\BrandsService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class UpdateBrandMutation
 * @package App\GraphQL\Mutations\Account\Brands
 */
class UpdateBrandMutation extends AdminMutation
{
    /**
     * Mutation attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'updateCategory',
        'description' => 'Mutation for updating of brand'
    ];

    /**
     * Brands service instance
     * @var BrandsService
     */
    protected $brands_service;

    /**
     * CreateBrandMutation constructor.
     * @param BrandsService $brands_service
     */
    public function __construct(BrandsService $brands_service)
    {
        $this->brands_service = $brands_service;
    }

    /**
     * Get type of mutation
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('brand');
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
            'description' => ['name' => 'description', 'type' => Type::string()],
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
     * @throws \Exception
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields): Model
    {
        $model = $this->brands_service->getModelById($args['id']);

        if (!$model) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return  $this->brands_service->update($model, $args);
    }
}
