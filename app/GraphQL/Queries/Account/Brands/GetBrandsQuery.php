<?php

namespace App\GraphQL\Queries\Account\Brands;

use App\GraphQL\Queries\Account\AbstractListQuery;
use App\Services\BrandsService;
use App\Services\CategoriesService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\SelectFields;

/**
 * Class GetBrandsQuery
 * @package App\GraphQL\Queries\Account\Brands
 */
class GetBrandsQuery extends AbstractListQuery
{
    /**
     * Brands service
     * @var BrandsService
     */
    protected $service;

    /**
     * GetBrandsQuery constructor.
     * @param BrandsService $service
     */
    public function __construct(BrandsService $service)
    {
        $this->service = $service;
    }

    /**
     * Definition of attributes array
     *
     * @var array
     */
    protected $attributes = [
        'name' => 'getBrands',
        'description' => 'Get all brands'
    ];

    /**
     * Get type definition
     *
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('brandsList');
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
        /** @var SelectFields $fields */
        $fields = $getSelectFields();

        $result = $this->service->indexModels($args);

        return $result;
    }
}
