<?php

declare(strict_types=1);

namespace App\GraphQL\Queries\Account\Categories;

use App\GraphQL\Queries\Account\AbstractListQuery;
use App\Services\CategoriesService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\SelectFields;

/**
 * Class GetCategoriesQuery
 * @package App\GraphQL\Queries
 */
class GetCategoriesQuery extends AbstractListQuery
{

    /**
     * Categories service
     * @var CategoriesService
     */
    protected $service;

    /**
     * GetCategoriesQuery constructor.
     * @param CategoriesService $service
     */
    public function __construct(CategoriesService $service)
    {
        $this->service = $service;
    }

    /**
     * Definition of attributes array
     *
     * @var array
     */
    protected $attributes = [
        'name' => 'getCategories',
        'description' => 'A query'
    ];

    /**
     * Get type definition
     *
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('categoriesList');
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
