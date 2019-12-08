<?php

namespace App\GraphQL\Mutations\Account\Brands;

use App\Services\BrandsService;
use App\Services\CategoriesService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Database\Eloquent\Model;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Mutation;

/**
 * Class CreateBrandMutation
 * @package App\GraphQL\Mutations\Account\Brands
 */
class CreateBrandMutation extends Mutation
{
    /**
     * Mutation attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'createBrand',
        'description' => 'A mutation'
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
            'name' => ['name' => 'name', 'type' => Type::nonNull(Type::string())],
            'description' => ['name' => 'description', 'type' => Type::string()],
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
            'description' => ['nullable', 'string']
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
        return $this->brands_service->store($args);
    }
}
