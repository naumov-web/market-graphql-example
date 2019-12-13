<?php

declare(strict_types=1);

namespace App\GraphQL\Queries\Auth;

use App\Services\UsersService;
use Closure;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Illuminate\Http\Response;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

/**
 * Class UserLoginQuery
 * @package App\GraphQL\Queries\Auth
 */
class UserLoginQuery extends Query
{
    /**
     * Attributes
     * @var array
     */
    protected $attributes = [
        'name' => 'Login user',
        'description' => 'A query'
    ];

    /**
     * Users service instance
     * @var UsersService
     */
    protected $users_service;

    /**
     * UserLoginQuery constructor.
     * @param UsersService $users_service
     */
    public function __construct(UsersService $users_service)
    {
        $this->users_service = $users_service;
    }

    /**
     * Get types of entities
     * @return Type
     */
    public function type(): Type
    {
        return GraphQL::type('login');
    }

    /**
     * Get list of arguments
     * @return array
     */
    public function args(): array
    {
        return [
            'email' => ['name' => 'email', 'type' => Type::nonNull(Type::string())],
            'password' => ['name' => 'password', 'type' => Type::nonNull(Type::string())]
        ];
    }

    /**
     * Resolve query
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
        $token = $this->users_service->attempt(
            [
                'email' => $args['email'],
                'password' => $args['password']
            ]
        );

        if (!$token) {
            abort(Response::HTTP_UNPROCESSABLE_ENTITY, [
                'email' => config('validation_errors.incorrect_email_or_password')
            ]);
        }

        return [
            'token' => $token,
        ];
    }
}
