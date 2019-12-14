<?php

namespace App\GraphQL\Mutations\Account\Brands;

use App\GraphQL\Mutations\AdminMutation;
use App\Services\BrandsService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Http\Response;
use Rebing\GraphQL\Support\Facades\GraphQL;

/**
 * Class DeleteBrandMutation
 * @package App\GraphQL\Mutations\Account\Brands
 */
class DeleteBrandMutation extends AdminMutation
{
    /**
     * Mutation attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'deleteBrand',
        'description' => 'Mutation for deleting of brand'
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
        $model = $this->brands_service->getModelById($args['id']);

        if (!$model) {
            abort(Response::HTTP_NOT_FOUND);
        }

        return [
            'success' => $this->brands_service->delete($model)
        ];
    }

}
