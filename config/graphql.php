<?php

declare(strict_types=1);

use example\Type\ExampleType;
use example\Query\ExampleQuery;
use example\Mutation\ExampleMutation;
use example\Type\ExampleRelationType;

return [

    // The prefix for routes
    'prefix' => 'graphql',

    // The routes to make GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Route
    //
    // Example:
    //
    // Same route for both query and mutation
    //
    // 'routes' => 'path/to/query/{graphql_schema?}',
    //
    // or define each route
    //
    // 'routes' => [
    //     'query' => 'query/{graphql_schema?}',
    //     'mutation' => 'mutation/{graphql_schema?}',
    // ]
    //
    'routes' => '{graphql_schema?}',

    // The controller to use in GraphQL request. Either a string that will apply
    // to both query and mutation or an array containing the key 'query' and/or
    // 'mutation' with the according Controller and method
    //
    // Example:
    //
     'controllers' => [
         'query' => '\Rebing\GraphQL\GraphQLController@query',
         'mutation' => '\Rebing\GraphQL\GraphQLController@mutation'
     ],
    //
    //'controllers' => \Rebing\GraphQL\GraphQLController::class.'@query',

    // Any middleware for the graphql route group
    'middleware' => [],

    // Additional route group attributes
    //
    // Example:
    //
    // 'route_group_attributes' => ['guard' => 'api']
    //
    'route_group_attributes' => [],

    'default_schema' => 'default',

    'schemas' => [
        'default' => [
            'query' => [
                'login' => \App\GraphQL\Queries\Auth\UserLoginQuery::class,
                'getCategories' => \App\GraphQL\Queries\Account\Categories\GetCategoriesQuery::class,
                'getBrands' => \App\GraphQL\Queries\Account\Brands\GetBrandsQuery::class,
            ],
            'mutation' => [
                // Categories
                'createCategory' => \App\GraphQL\Mutations\Account\Categories\CreateCategoryMutation::class,
                'updateCategory' => \App\GraphQL\Mutations\Account\Categories\UpdateCategoryMutation::class,
                'deleteCategory' => \App\GraphQL\Mutations\Account\Categories\DeleteCategoryMutation::class,
                // Brands
                'createBrand' => \App\GraphQL\Mutations\Account\Brands\CreateBrandMutation::class,
            ],
            'middleware' => ['auth.graphql'],
            'method' => ['get', 'post', 'put', 'delete']
        ],
    ],

    'types' => [
        'login' => \App\GraphQL\Types\Resources\Auth\UserLoginType::class,
        'user' => \App\GraphQL\Types\Models\UserType::class,
        'category' => \App\GraphQL\Types\Models\CategoryType::class,
        'categoriesList' => \App\GraphQL\Types\Resources\Account\Categories\CategoriesList::class,
        'brandsList' => \App\GraphQL\Types\Resources\Account\Brands\BrandsList::class,
        'brand' => \App\GraphQL\Types\Models\BrandType::class,
        'defaultBoolean' => \App\GraphQL\Types\Resources\DefaultBooleanType::class,
    ],

    'lazyload_types' => false,

    'error_formatter' => ['\Rebing\GraphQL\GraphQL', 'formatError'],

    /*
     * Custom Error Handling
     *
     * Expected handler signature is: function (array $errors, callable $formatter): array
     *
     * The default handler will pass exceptions to laravel Error Handling mechanism
     */
    'errors_handler' => ['\Rebing\GraphQL\GraphQL', 'handleErrors'],

    // You can set the key, which will be used to retrieve the dynamic variables
    'params_key'    => 'variables',

    /*
     * Options to limit the query complexity and depth. See the doc
     * @ https://github.com/webonyx/graphql-php#security
     * for details. Disabled by default.
     */
    'security' => [
        'query_max_complexity'  => null,
        'query_max_depth'       => null,
        'disable_introspection' => false,
    ],

    /*
     * You can define your own pagination type.
     * Reference \Rebing\GraphQL\Support\PaginationType::class
     */
    'pagination_type' => \Rebing\GraphQL\Support\PaginationType::class,

    /*
     * Config for GraphiQL (see (https://github.com/graphql/graphiql).
     */
    'graphiql' => [
        'prefix'     => '/graphiql',
        'controller' => \Rebing\GraphQL\GraphQLController::class.'@graphiql',
        'middleware' => [],
        'view'       => 'graphql::graphiql',
        'display'    => env('ENABLE_GRAPHIQL', true),
    ],

    /*
     * Overrides the default field resolver
     * See http://webonyx.github.io/graphql-php/data-fetching/#default-field-resolver
     *
     * Example:
     *
     * ```php
     * 'defaultFieldResolver' => function ($root, $args, $context, $info) {
     * },
     * ```
     * or
     * ```php
     * 'defaultFieldResolver' => [SomeKlass::class, 'someMethod'],
     * ```
     */
    'defaultFieldResolver' => null,

    /*
     * Any headers that will be added to the response returned by the default controller
     */
    'headers' => [],

    /*
     * Any JSON encoding options when returning a response from the default controller
     * See http://php.net/manual/function.json-encode.php for the full list of options
     */
    'json_encoding_options' => 0,
];
